<?php

namespace App\Http\Controllers;

use App\ClientApplication;
use App\BreakdownItem;
use App\BreakdownList;
use Carbon\Carbon;
use App\Events\BreakdownItems\BreakdownItemPaymentStatusChange;
use App\Events\BreakdownItems\BreakdownItemStatusChange;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataHydrationController extends Controller
{

    public function clientapplication(Request $request)
    {
        $clientApplication = ClientApplication::find($request->refId);
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
        $breakdownList->due_date = new Carbon($request->input('blDateField'));
        $breakdownList->save();

        echo json_encode(['blDateFieldResponse' => $breakdownList->getDueDate()]);

        return;
    }

    public function blStatusUpdate()
    {

    }

    public function blDelete(Request $request)
    {

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

        $newItemBalance = $breakdownItem->item_balance;
        $newListBalance = $breakdownItem->breakdownList->list_balance;
        $newListDeposit = $breakdownItem->breakdownList->list_deposit;
        $newProjectBalance = $breakdownItem->clientApplication->project_balance;
        $newProjectDeposit = $breakdownItem->clientApplication->project_deposit;

        $breakdownItem->delete();

        event(new BreakdownItemPaymentStatusChange($breakdownItem));

        echo json_encode([
            'newItemBalance' => $newItemBalance,
            'newListBalance' => $newListBalance,
            'newListDeposit' => $newListDeposit,
            'newProjectBalance' => $newProjectBalance,
            'newProjectDeposit' => $newProjectDeposit,
            'CAStatus' => $breakdownItem->clientApplication->payment_status,
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
        $keys = array($request->input('checkBoxesArray'));
        for($i = 0; $i < sizeOf($keys); $i++)
        {
            $breakdownLists = collect(BreakdownList::find($keys[$i]));
        }
        $paymentDue = $breakdownLists->sum('list_balance');
        echo json_encode(['paymentDue' => $paymentDue]);
        
        
        return;
    }
}
