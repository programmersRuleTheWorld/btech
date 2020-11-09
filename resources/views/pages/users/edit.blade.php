@extends('layouts.app')

@section('content')

<div class="col-md-6 m-auto">
    <div class="card bg-info">
        <div class="card-header text-center">
            Your Personal Information
        </div>
        <form action="{{ route('users.update', [$user->id]) }}" method="POST">
        @method('PUT')
        @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md">
                        <div class="form-group">
                            First Name: 
                            <input type="text" name="first_name" class="form-control form-control-sm" value="{{ $user->first_name }}"> 
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            Last Name: 
                            <input type="text" name="last_name" class="form-control form-control-sm" value="{{ $user->last_name }}"> 
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md">
                        <div class="form-group">
                            Email Address: 
                            <input type="text" name="email" class="form-control form-control-sm" value="{{ $user->email }}"> 
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">    
                            Phone Number: 
                            <input type="text" name="phone_number" class="form-control form-control-sm" value="{{ $user->phone_number }}"> 
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Company Name: 
                            <input type="text" name="company_name" class="form-control form-control-sm" value="{{ $user->company_name }}" placeholder="If applicable, please enter your Company Name here..."> 
                        </div>
                    </div>
                </div>
                <div class="text-center">(Only fill out these if changing your password, otherwise leave blank):</div>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            Old Password:
                            <input type="password" name="old_password" class="form-control form-control-sm" placeholder="Current password...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            New Password:
                            <input type="password" name="new_password" class="form-control form-control-sm" placeholder="New password...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            Confirm New Password:
                            <input type="password" name="confirm_password" class="form-control form-control-sm" placeholder="Confirm new password...">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark text-info">Submit</button>
        </form>
    </div>
</div>



@endsection