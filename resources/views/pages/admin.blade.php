@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-4 m-auto">
        <div class="card bg-info ">
            <div class="card-header text-center">
                Administrative Login Console
                <div class="card-body">
            <input class="form-control form-group" label="Username" placeholder="Username...">
            <input class="form-control form-group" type="password" label="Password" placeholder="Password...">
            <button class="btn btn-dark text-info" type="submit">Login</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection