@extends('layouts.app')

@section('content')

<div class="row mb-2">
    <div class="col-md-6">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">About the CEO</h3>
            </div>
                <div class="card-body">
                        <img src="{{ asset('images/meandjoe.jpg') }}" width="30%" class="rounded-circle float-left">
                        <p>
                            I'm Robert Bertram, but you can call me Robbie; I'm a Security+ certified programmer. After years of self-taught programming across various frameworks, I founded Bertram Technologies Corporation in December, 2019, to bring affordable, efficient, and secure software development to the business market, and work tirelessly to that end.
                        </p>
                        <p>
                            I have had more challenges in life than the average individual, and those challenges have informed my resillience. For years I'd stayed awake into the long hours of the night solving programming problems, no matter how small, unpaid. I have long looked forward to the day that I can apply that dedication and insight to the needs of my clients.
                        </p>
                        <img src="{{ asset('images/cred.jpg') }}" width="100%" class="float-right">
                    </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">About the Company</h3>
            </div>
                <div class="card-body">
                <img src="{{ asset('images/btlogo.gif') }}" width="30%" class="rounded-circle float-left">
                        <p>
                            Bertram Technologies, formally established as Bertram Technologies Corporation, provides affordable, efficient, and secure software development services to individuals and businesses. 
                        </p>
                        <p>
                            From web, to mobile, to native software development, Bertram Technologies does it all. For security reasons, no one project is <b>ever</b> outsourced in its entirety. We take pride in providing security, quality and information assurance to the specifications of our clients.
                        </p>
                </div>
        </div>
    </div>
</div>
@endsection