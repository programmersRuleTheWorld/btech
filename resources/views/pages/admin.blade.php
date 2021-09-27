@extends('layouts.app')

@section('content')

<div class="row mb-2">
    <div class="col-md-12 mb-2">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>Administration Console</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('adminSearch') }}" method="POST">
                <div class="row mb-2">   
                    @csrf
                    <div class="col-md-3">
                    <input class="form-control mb-2" type="text" id="queryTab" name="searchString">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control mb-2 text-center" id="searchTab" name="searchType">
                            <option selected value="0">User via Last Name</option>
                            <option value="1">User via Email</option>
                            <option value="2">Client Applications via Last Name</option>
                            <option value="3">Client Application via RefID</option>
                            <option value="4">Client Applications via Email</option>
                            <option value="5">Actionable</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-dark text-info mb-2">Go</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if(isset($users))
    @include('pages.include.adminpanel.userslist')
@endif
@if(isset($clientApplications))
    @include('pages.include.adminpanel.clientapplicationslist')
@endif

@endsection