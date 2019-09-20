@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="row mb-5">
    <div class="col-md-5">
        <div class="card bg- white ">
            @include('include.myposts')
        </div>
    </div>
<div class="col-md-7">
        <div class="card bg- white ">
            @include('include.myprojects')
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card bg- white ">
            @include('include.myjobs')
        </div>
    </div>
</div>
    
@endsection
