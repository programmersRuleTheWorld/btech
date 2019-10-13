@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col mb-2">
    <div class="card bg-info ">
        <div class="card-header">
            <h3 class="text-center">Services</h3>
        </div>
            <p>
                We offer a wide array of technology services for both individual and enterprise clients, including website design and 
                development; website and server security analysis (known as Penetration Testing); mobile phone app development; 
                development and maintenance operations (known as DevOps); maintenance of old code (known as Legacy Code), and much more. 
                Please check out our services in more granular detail below.
            </p>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">Web Development / Design</h3>
            </div>
            <p>
            We offer web development as well as design services, with a focus on what will make you the most profit, as well as what will
            be most maintainable, saving you time and money in the long run.
            </p>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">Mobile App Development</h3>
            </div>
            <p>
                Whether you need an app for iPhone, Android or some obscure operating system, we'll work with you to make that a reality.
            </p>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">Security Analysis / Penetration Testing</h3>
            </div>
            <p>
                Information security is paramount for business - both for reputation and legal liability. We employ US government-approved NIST (National Institute of Standards and Technology) standards with all of our projects; visit <a class="text-dark" href="nist.gov">nist.gov</a> for more information on NIST standards and their implications.
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">DevOps / Site Management / Maintenance</h3>
            </div>
            <p>
                The modern information technology pipeline is not a simple affair. Delegation and outsourcing are the name of the game, 
                and we operate 24 hours a day, 7 days a week, to ensure your mission-critical systems operate flawlessly.
            </p>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">Custom Proposal</h3>
            </div>
            <p>
                We're happy to consider any proposal that comes across our desk; if you have project requirements not listed on our
                website, let us know, and we'll work with you to see what we can do for you.
            </p>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">Legacy Code</h3>
            </div>
            <p>
                We can maintain and update systems running Legacy Code, regardless of the technology stack.
            </p>
        </div>
    </div>
</div>

<script src="{{ asset('../../js/custom/card_slide.js') }}" defer></script>

@endsection