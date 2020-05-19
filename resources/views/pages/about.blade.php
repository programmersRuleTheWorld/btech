@extends('layouts.app')

@section('content')

<div class="row mb-2">
    <div class="col-md-6">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">About the CEO</h3>
            </div>
                <div class="card-body">
                        <img src={{ asset('images/meandjoe.jpg') }} width="30%" class="rounded-circle float-left">
                        <p>
                            Founder Robert Bertram is an obsessive and single-minded programmer who's
                            spent many years perfecting his craft. Having traveled Asia and finding
                            other cultures fascinating, he spends most of his time when not programming
                            learning a new language, watching documentaries or relaxing at home
                            with his partner and service dog.
                        </p>
                        <p>
                            Having a lifelong visual disability called retinopathy of prematurity,
                            he has long struggled to live a "normal" life - in 2016 he got his first
                            license, and in 2018 he passed the Motorcycle Safety Foundation's Basic Rider
                            Course in Orlando, Florida.
                        </p>
                        <p>
                            Having grown up in the hills of Berkshire County, Massachusetts, but also
                            being a native New Yorker, Mr. Bertram plans on returning to New York City,
                            while turning Berkshire County into a telecommuting tech hub to create the type of 
                            opportunities for young people that he wished he'd had a decade ago.
                        </p>
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">About the Company</h3>
            </div>
                <div class="card-body">
                        <img src={{ asset('images/logos/btlogoredgradient.svg') }} width="30%" class="rounded-circle float-left">
                        <p>
                            Bertram Technologies, formally named Bertram Technologies Corporation, 
                            was incorporated on December 1st, 2019 in Albany, New York. Mr. Bertram 
                            is CEO and sole shareholder.
                        </p>
                        <p>
                            As services are added and revenues grow, the Corporation looks forward
                            to hiring permanent employees, predominantly in the Berkshire County area,
                            to serve as hourly support staff.
                        </p>
                </div>
        </div>
    </div>
</div>
@endsection