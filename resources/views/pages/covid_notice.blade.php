@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md text-center">
        @if($thanksmsg ?? '')
        <div class="col-md-6 m-auto">
            <div class="card bg-info">
                <div class="card-header bg-dark text-info">
            Your submission has been received!
                </div>
                <div class="card-body">
                    <p>{{ $thanksmsg }}</p>
                </div>
            </div>
        </div>
        @else
        <div class="card bg-info">
            <div class="card-header flashy">
                <b>As a result of the COVID-19 Emergency, all business operations are suspended until June 28th.</b> 
            </div>
        <div class="card-body bg-success text-dark">
            When business resumes, we will begin a marketing campaign in search of clients. If you would
            be interested in a 1099 contracting opportunity, please fill out the form below and we will
            contact you at our earliest opportunity.
        </div>
        <div class="card bg-info">
            <div class="card-header col-md-4 text-center">
                1099 Marketing Opportunity
            </div>
            <div class="row">
                <div class="col-md-4 mb-2">
                    <p>The COVID-19 pandemic has wreaked economic havoc across the world, and we understand
                    that many are looking for additional income during this time. We would like to
                    invite you to be one of the first to help us market our services in exchange
                    for a percentage of revenue in commission. Details provided below.
                    </p>
                    <p><b>SYNOPSIS</b>: As part of our marketing team, you will solicit individuals and businesses
                    in need of web or app design, development, hosting, security and custom programming and aoftware
                    development services.</p>
                    <p><b>PAYMENT</b>: You will be compensated on commission for any services sold to clients
                    referred by you; your earnings may be withdrawn by you via PayPal at any time. With our in-house
                    sales tracking system, you will be able to track your sales at any time.</p>
                    <p>We will be posting our initial marketing campaigns at launch, and will
                    update them periodically. We will be available to answer
                    any questions you may have during your time marketing with us.</p>
            </div>
            <div class="col-md-5 mb-2">
                <img class="img-fluid float-left" src={{ asset('images/marketing.png') }}>
            </div>
            <div class="col-md-3 mb-2">
                <div class="card bg-info">
                We will never sell or share your information without consent; please see our
                <a  class="text-dark font-weight-bold" href="{{ route('privacy') }}">Privacy Policy</a> for more information.
       <form id="covid_form" action="{{ route('covid.form') }}" method="POST">
            @csrf
                <div class="form-group">
                    <div class="form-row col-md">
                        <label for="First Name">
                            First Name
                        </label>
                        <input type="text" name="first_name" class="form-control form-control-sm" placeholder="Enter your First Name here...">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row col-md">
                        <label for="Email">
                            Email
                        </label>
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter your e-mail address here...">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row col-md">
                        <label for="Comment">
                            <b>Optional</b> How did you hear about this opportunity?
                        </label>
                        <textarea id="body" type="text" name="comment" class="form-control form-control-sm placeholder="Enter your Comment here..."></textarea>
                    </div>
                </div>
            <div class="row">
                <button class="g-recaptcha btn btn-dark text-info ml-4" data-theme="dark" data-sitekey="6Lc4ufsUAAAAALPQKf15me6YEOxXZQkeaLGTIPHT" data-callback="onSubmit" data-action="submit">Submit</button>
            </div>
        </form>
        </div>
    </div>

                </div>
            </div>
        </div>
    @endif
    </div>
</div>

<script>
    function onSubmit(token) {
      document.getElementById("covid_form").submit();
    }
</script> 

@endsection
