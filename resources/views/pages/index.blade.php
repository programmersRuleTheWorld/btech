@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card bg-info ">
            <div class="card-header text-center">
                <h3>The Latest From B-Tech</h3>
            </div>
            <div class="card-body">
@include('include.featuredpost')
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card bg-info mb-2">
                <div class="card-header text-center">
                        <h3>Client Application</h3>
                    </div>
            <div class="card-body">
                    <h5 class="text-center text-dark">
                        Welcome to Bertram Technologies! Need a new website or mobile app, maintenance for an existing one,
                        or a custom web project or legacy code work (COBOL, C, etc.)?
                    </h3>
                    <h2 class="text-center">
                        Let us know today!
                    </h2>
                    <div id="appwarning" class="alert bg-warning col mb-2 m-auto text-center text-dark">
                            Before you complete the Client Application, you should <a class="text-dark" href={{ route('register') }}><b>create an account</b></a>!
                        </div>                        
                        Fields marked * required
@include('include.clientapplication')
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card bg-info ">
                <div class="card-header text-center">
                        <h3>Our Services</h3>
                    </div>
            @include('include/featuredservices')
        </div>
    </div>
</div>

@endsection