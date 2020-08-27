@extends('layouts.app')

@section('content')

<div class="col-md-4 m-auto">
    <div class="card bg-info">
        <div class="card-header text-center">
            Your Personal Information
        </div>
        <div class="card-body">
        <a href="/users/{{ $user->id }}/edit">
            Edit
        </a>
        
        Name: {{ $user->getName() }} <br><hr>
        Email Address: {{ $user->getEmail() }} <br><hr>
        Phone Number: {{ $user->getPhoneNumber() }} <br><hr>
        Company Name: {{ $user->getCompanyName() }} <br>
    </div>
</div>



@endsection