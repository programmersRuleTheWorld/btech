<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if($user->id == auth()->user()->id)
        {
            return view('pages.users.show')->with('user', $user);
        }
        else
        {
            return redirect()->route('dashboard')->with('error', "Unauthorized account access detected; this attempt has been logged.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if($user->id == auth()->user()->id)
        {
            return view('pages.users.edit')->with('user', $user);
        }
        else
        {
            return redirect()->route('dashboard')->with('error', "Unauthorized account access detected; this attempt has been logged.");
        }    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($user->id == auth()->user()->id)
        {
            $oldPassword = $request->input('old_password');
            $newPassword = bcrypt($request->input('new_password'));
            $confirmPassword = $request->input('confirm_password');
            
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
            ]);
            
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->phone_number = $request->input('phone_number');
            
            if($oldPassword !== null && Hash::check($oldPassword, $user->password) === true)
            {
                if(Hash::check($confirmPassword, $newPassword) === true)
                {
                    if(Hash::check($oldPassword, $newPassword) === true)
                {
                    return back()->with('error', "Your new password cannot be the same as your old password. Please try again.");
                }
                $this->validate($request, [
                    /*                'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required', */
                    'old_password' => 'required|min:8',
                    'new_password' => 'required|min:8',
                'confirm_password' => 'required|min:8',
            ]);
            
            $user->password = $newPassword;
            
            $user->save();

            return back()->with('success', "User information and password updated!");
            }
            else
            {
                return back()->with('error', "New password and password confirmation field mismatch; please try again.");
            }
        }
        elseif($oldPassword !== null && Hash::check($oldPassword, $user->password) === false)
        {
            return back()->with('error', "Old password mismatch, please try again.");
        }
        
        $user->save();

        return back()->with('success', "User information updated!");
    }
    else
    {
        return redirect()->route('dashboard')->with('error', "Unauthorized account access detected; this attempt has been logged.");
    }
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return back()->with('success', 'User deleted!');
    }
    
    public function updateRole(Request $request, User $user)
    {
        $role = $request->input('role');
        $user->roles()->toggle([$role]);
        
        return back();
    }
}
