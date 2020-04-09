@extends('layouts.app')

@section('content')

<div class="col-md-4 m-auto">
    <div class="card bg-info">
        <div class="card-header text-center">
            Your Personal Information
        </div>
        <div class="card-body">
        <a href="/profiles/{{ $user->id }}/edit">
            Edit
        </a>
        
        Name: {{ $user->first_name . ' ' . $user->last_name }}<br><hr>
        Email Address: {{ $user->email }}<br><hr>
        Phone Number: @if(!$user->phone_number)
        No phone number set<br>
        @else
        {{ $user->phone_number }}<br>
        @endif
        <hr>
        Company Name: @if(!$user->company_name)
        No company name set
        @else
        {{ $user->company_name }}
        @endif<br>
    </div>
</div>



@endsection