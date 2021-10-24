@extends('layouts.app')

@section('content')

@if($user)
{{ $user->isAdmin() }}
@endif
<div class="row mb-2">
    <!-- <div class="col-md mb-2">
        <div class="card bg-info ">
            <div class="card-header text-center">
                <h3>Security News</h3>
            </div>
            <div class="card-body carouselcard">
                @include('pages.include.newsstream')
            </div>
        </div>
    </div>
    !-->
    <div class="col-md-8 m-auto mb-2">
        <div class="card bg-info">
                <div class="card-header text-center">
                        <h3>Client Application</h3>
                </div>
            <div class="card-body">
                    <h5 class="text-center text-dark">
                        We create, test and host high-security software applications for web, mobile and more. Do you have a project that needs fulfilled?
                    </h5>
                    <h2 class="text-center">
                        Let us know today!
                    </h2>
                    @if(!$user)
                    <div id="appwarning" class="alert bg-warning col mb-2 m-auto text-center text-dark">
                            Before you complete the Client Application, you should <a class="text-dark" href={{route('register') }}><b>create an account</b></a>! This allows you to track your project status anytime you want!
                    </div>
                    @endif                        
                        Fields marked * required
@include('pages.include.clientapplication')
            </div>
        </div>
    </div>
<!--    <div class="col-md mb-2">
        <div class="card bg-info ">
                <div class="card-header text-center">
                        <h3>Our Services</h3>
                    </div>
                    <div class="card-body carouselcard">
            @include('pages.include.featuredservices')
                    </div>
        </div>
    </div> !-->
</div>


@endsection