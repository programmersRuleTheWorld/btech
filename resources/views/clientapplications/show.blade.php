@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-md-6">
<div class="card bg-info">
    <div class="card-header">
        <h3 class="text-center">Client Information</h3>
    </div>
        <table class="table table-hover table-striped table-condensed">
            <tr><td class="table-striped">Status: @include('include.clientapplication_status')
            <tr><th>Reference Identification Number:</th><td>{{ $clientapplication->ref_id }}</td></tr>
            <tr><th>Client Name:</th><td>{{ $clientapplication->name }}</td></tr>
            <tr><th>Client Company:</th><td>{{ $clientapplication->company }}</td></tr>
            <tr><th>Client E-mail:</th><td>{{ $clientapplication->email }}</td></tr>
            <tr><th>Client Phone Number:</th><td>{{ $clientapplication->number }}</td></tr>
            <tr><th>Service Type:</th><td>{{ $clientapplication->selection }}</td></tr>
            <tr><th>Project Description:</th><td>{{ $clientapplication->project }}</td></tr>
        </table>
    <div class="row ml-2">
        <a href="/dashboard" class="btn btn-dark text-info m-1">Back</a>
        <a href="/clientapplications/{{$clientapplication->ref_id}}/edit" class="btn btn-dark text-info m-1">Edit</a>
    </div>
</div>
</div>
<div class="col-md-6"> 
    <div class="card bg-info">
        <div class="card-header">
            <h3 class="text-center">
                Ticket Comments
            </h3>
        </div>
    @include('include.comments')
    </div>
</div>
</div>

@endsection