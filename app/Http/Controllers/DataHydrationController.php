<?php

namespace App\Http\Controllers;

use App\ClientApplication;
use App\BreakdownItem;
use App\BreakdownList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Events\BreakdownItems\BreakdownItemPaymentStatusChange;
use App\Events\BreakdownItems\BreakdownItemStatusChange;
use App\Events\BreakdownLists\BreakdownListCreated;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataHydrationController extends Controller
{

    public function clientapplication(Request $request)
    {
        $clientApplication = ClientApplication::find($request->refId);
        $this->authorize('update', $clientApplication);
        $clientApplicationResp = [
            'gov_contract' => $clientApplication->gov_contract,
            'existing_site' => $clientApplication->existing_site,
            'site_type' => $clientApplication->site_type,
            'where_hosted' => $clientApplication->where_hosted,
            'site_url' => $clientApplication->site_url,
            'backend_type' => $clientApplication->backend_type,
            'backend_framework' => $clientApplication->backend_framework,
            'frontend_framework' => $clientApplication->frontend_framework,
            'backend_framework_type' => $clientApplication->backend_framework_type,
            'frontend_framework_type' => $clientApplication->frontend_framework_type,
            'is_platform' => $clientApplication->is_platform,
            'platform_type' => $clientApplication->platform_type,
            'db_type' => $clientApplication->db_type,
            'test_scope' => $clientApplication->test_scope,
            'security_incidents' => $clientApplication->security_incidents,
            'legacy_backend_type' => $clientApplication->legacy_backend_type,
            'new_or_existing_app' => $clientApplication->new_or_existing_app,
            'app_store' => $clientApplication->app_store,
            
        ];
        $response = json_encode($clientApplicationResp);

        echo $response;
    }

    public function privacy()
    {
        $privacyPolicy = strip_tags(DB::table('agreements')->value('privacy_policy'));
        $response = ['privacyPolicy' => $privacyPolicy];
        echo json_encode($response);
    }

    public function blDateUpdate(Request $request)
    {
        $breakdownList = BreakdownList::find($request->input('blToken'));
        $this->authorize('update', $breakdownList);
        $breakdownList->due_date = new Carbon($request->input('blDateField'));
        $breakdownList->save();

        echo json_encode(['blDateFieldResponse' => $breakdownList->getDueDate()]);

        return;
    }

    public function blCreate(Request $request)
    {        
        $this->validate($request,
         [
            'blDateField' => 'required',
            'blTitle' => 'required|max:255',
            'blDescription' => 'required|max:2000',
        ]);
        $this->authorize('create', BreakdownList::class);
        $breakdownList = new BreakdownList();
        $breakdownList->parent_ref_id = $request->input('ref_id');
        $breakdownList->due_date = new Carbon($request->input('due_date'));
        $breakdownList->list_title = $request->input('blTitle');
        $breakdownList->list_description = $request->input('blDescription');
        $breakdownList->save();


        echo json_encode([
            'blDateField' => $breakdownList->getDueDate(),
            'blDescription' => $breakdownList->list_description,
            'newBlToken' => $breakdownList->list_id,
            'blTitle' => $breakdownList->list_title,
        ]);

        return;
    }

    public function blDelete(Request $request)
    {
        $breakdownList = BreakdownList::find($request->input('blToken'));
        $this->authorize('delete', $breakdownList);
        $breakdownList->delete();

        echo json_encode([
            'deleted' => true,
        ]);
        return;
    }

    public function biStatusUpdate(Request $request)
    {
        $breakdownItem = BreakdownItem::find($request->biToken);

        if($breakdownItem->exists() == true)
        {
            $this->authorize('isComplete', $breakdownItem);

            if($breakdownItem->item_status == false)
            {
                $breakdownItem->item_status = true;
                $breakdownItem->save();
            }
            elseif($breakdownItem->item_status == true)
            {
                $breakdownItem->item_status = false;
                $breakdownItem->save();
            }
                        
            event(new BreakdownItemStatusChange($breakdownItem));

            echo json_encode([
                'biStatus' => $breakdownItem->item_status,
                'blStatus' => $breakdownItem->breakdownList->list_status,
            ]);
            
            return;
        }
    }

    public function biCreate(Request $request)
    {
        $user = auth()->user();
        $this->authorize('create', BreakdownItem::class);
        $breakdownItem = new BreakdownItem();
        $breakdownItem->item_description = $request->input('biDescription');
        $breakdownItem->frontend = $request->input('biFrontend');
        $breakdownItem->parent_ref_id = $request->input('ref_id');
        $breakdownItem->parent_list_id = $request->input('parent_list_id');
        $breakdownItem->user_id = $user->id;
        $breakdownItem->save();

        echo json_encode([
            'biDescription' => $breakdownItem->item_description,
            'biFrontend' => $breakdownItem->frontend,
            'biUpdatedAt' => $breakdownItem->getUpdatedAtDate(),
            'biToken' => $breakdownItem->item_id,
            'biPrice' => $breakdownItem->item_balance,
            'parentRefId' => $breakdownItem->parent_ref_id,
            'parentListId' => $breakdownItem->parent_list_id,
        ]);

        return;
        

    }

    public function biDelete(Request $request)
    {
        $breakdownItem = BreakdownItem::find($request->input('biToken')); 
        $this->authorize('delete', $breakdownItem);
        $breakdownItem->breakdownList->list_balance -= $breakdownItem->item_balance;
        $breakdownItem->breakdownList->list_deposit -= $breakdownItem->item_deposit;
        $breakdownItem->clientApplication->project_balance -= $breakdownItem->item_balance;
        $breakdownItem->clientApplication->project_deposit -= $breakdownItem->item_deposit;
        if(isset($breakdownItem->clientApplication->user))
        {
            $breakdownItem->user->user_balance -= $breakdownItem->item_balance;
            $breakdownItem->user->save();
        }
        $breakdownItem->breakdownList->save();
        $breakdownItem->clientApplication->save();

        $breakdownItem->delete();

        event(new BreakdownItemPaymentStatusChange($breakdownItem));

        echo json_encode([
            'deleted' => true,
            'CAStatus' => $breakdownItem->clientApplication->payment_status,
            'listBalance' => $breakdownItem->breakdownList->list_balance,
            'newProjectBalance' => $breakdownItem->clientApplication->project_balance,
        ]);

        return;
    }

    public function biPriceUpdate(Request $request)
    {
        $breakdownItem = BreakdownItem::find($request->input('biToken'));

        $this->authorize('updatePrice', $breakdownItem);
        if($request->input('biPrice') != $breakdownItem->item_balance)
        {
        if(isset($breakdownItem->user))
        {
            $breakdownItem->user->user_balance -= $breakdownItem->clientApplication->project_balance;
        }
        $breakdownItem->breakdownList->list_balance -= $breakdownItem->item_balance;
        $breakdownItem->breakdownList->list_deposit -= $breakdownItem->item_deposit;
        $breakdownItem->clientApplication->project_balance -= $breakdownItem->item_balance;
        $breakdownItem->clientApplication->project_deposit -= $breakdownItem->item_deposit;
        $breakdownItem->item_balance = $request->input('biPrice');
        $breakdownItem->item_deposit = $breakdownItem->item_balance * $breakdownItem->breakdownList->clientApplication->project_deposit_rate;
        $breakdownItem->item_balance -= $breakdownItem->item_deposit;
        $breakdownItem->breakdownList->list_balance += $breakdownItem->item_balance;
        $breakdownItem->breakdownList->list_deposit += $breakdownItem->item_deposit;
        $breakdownItem->clientApplication->project_balance += $breakdownItem->item_balance;
        $breakdownItem->clientApplication->project_deposit += $breakdownItem->item_deposit;

        if(isset($breakdownItem->user))
        {
            $breakdownItem->user->user_balance += $breakdownItem->clientApplication->project_balance;
        }
        $breakdownItem->breakdownList->save();
        $breakdownItem->clientApplication->save();
        $breakdownItem->user->save();
        $breakdownItem->save();
        
        event(new BreakdownItemPaymentStatusChange($breakdownItem));

        $newItemBalance = $breakdownItem->item_balance;
        $newListBalance = $breakdownItem->breakdownList->list_balance;
        $newListDeposit = $breakdownItem->breakdownList->list_deposit;
        $newProjectBalance = $breakdownItem->clientApplication->project_balance;
        $newProjectDeposit = $breakdownItem->clientApplication->project_deposit;
        $CAStatus = $breakdownItem->clientapplication->payment_status;

        echo json_encode([
            'newItemBalance' => $newItemBalance,
            'newListBalance' => $newListBalance,
            'newListDeposit' => $newListDeposit,
            'newProjectBalance' => $newProjectBalance,
            'newProjectDeposit' => $newProjectDeposit,
            'CAStatus' => $CAStatus,
        ]);

        return;
       }
    }

    public function commentDelete()
    {

    }

    public function commentCreate()
    {

    }    

    public function paymentHydration(Request $request)
    {
        if($request->payableArray != null)
        {
            $keys = array($request->input('payableArray'));
            for($i = 0; $i < sizeOf($keys); $i++)
            {
                $breakdownLists = collect(BreakdownList::find($keys[$i]));
            }
            $paymentDue = $breakdownLists->sum('list_balance');
        }    
        else
        {
            $paymentDue = 0;
        }   
        echo json_encode(['paymentDue' => $paymentDue]);
        return;
    }
}
