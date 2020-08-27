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
                Please check out our services in more granular detail below. <b>Please see our 
                <a class="text-dark" href={{ route('service_agreement') }}>Service Agreement</a> to see our project intake and
                completion process.</b>
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
            Expertly tailored websites in both form and function, each a purpose-built solution to solve a set of core business needs to give our clients every competitive advantage.
            </p>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">Mobile App Development</h3>
            </div>
            <p>
            From no-frills to flashy and unique, mobile apps can be the perfect complement to a company’s digital presence, augmenting and enhancing a web infrastructure in a way that puts your value proposition in the palm of your customers’ hands. We develop for both iOS and Android.
            </p>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">Security Analysis / Penetration Testing</h3>
            </div>
            <p>
            An increasingly important aspect of computing in the era of the cloud, a cybersecurity specialist can test your website, database and hosting server for weaknesses. What we do next is up to you – whether we stop at delivering you a report, or taking actionable steps to secure your assets, you're in control.
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
            Procuring, deploying and maintaining infrastructure for your business needs can be complicated – we make it simple; your mission-critical systems online, on-demand, when you need them most – period.
            </p>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">Custom Proposal</h3>
            </div>
            <p>
            If you have a need not addressed by our services thus far, please submit a Client Application under that category and let us know what we can do for you! Unlike other shops whose mainline is a CMS like WordPress (while we can and do deal with WordPress), our purpose-built solutions are made from scratch – not using a drag and drop Content Management System, but with pure code, optimized and tested to fit your business needs.
            </p>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card bg-info ">
            <div class="card-header">
                <h3 class="text-center">Legacy Code</h3>
            </div>
            <p>
            If you have older systems – be they websites, mainframes or systems software – let us breathe new life into them by trying out our Legacy Code Maintenance service. Depending on your needs, we can optimize your existing code, or entirely rewrite your codebase in a modern system tailored to today’s business needs.            
            </p>
        </div>
    </div>
</div>

@endsection