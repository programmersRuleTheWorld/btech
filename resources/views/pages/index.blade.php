@extends('layouts.app')

@section('content')

<div class="row mb-2">
    <div class="col-md m-auto mb-2">
        <div class="card bg-info">
                <div class="card-header text-center">
                    <h3>Not just another web development firm...</h3>
                    <h5 class="col-md-8 m-auto">Your business is at war 24 hours of every day; Bertram Technologies is your Praetorian Guard. 
                        @if($auth != true)
                        <a class="text-dark" href="{{ route('register') }}">Make an account</a> today and let us fight for your absolute digital superiority, or fill out a secure <a class="text-dark" href="{{ route('client_application') }}">Client Application</a> now and add it to an account later.
                        @endif
                    </h5>
                </div>
            <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="card bg-info">
                        <div class="card-header">
                            <h3 class="text-center">Software Development
                            <i class="bi-lock-fill" style="color:green;"></i>
                            </h3>
                        </div>
                        <div class="card-body">
                                <p class="text-center">
                                    <img src="{{ asset('images/lock.gif') }}" class="m-auto row col-6">
                                    Rapid, secure, HIPAA-compliant software development on-budget, on-time, everytime will allow your organization to gain and maintain digital superiority without compromising your customer experience; some of what our world-class programmers can offer are:
                                </p>
                            <ul class="greencheck">
                                <li>
                                    <i class="bi-lock-fill" style="color:green;"></i>
                                    24/7 Project Management Via Your Bertram Technologies Account
                                </li>
                                <li>
                                    <i class="bi-lock-fill" style="color:green;"></i>
                                    Secure, Data-Driven Websites, Mobile and Desktop Apps
                                </li>
                                <li>
                                    <i class="bi-lock-fill" style="color:green;"></i>
                                    Stylish App-Like Frontends Using the Latest Frameworks
                                </li>
                                <li>
                                    <i class="bi-lock-fill" style="color:green;"></i>
                                    Scalable, Secure Backend Infrastructure
                                </li>
                                <li>
                                    <i class="bi-lock-fill" style="color:green;"></i>
                                    Standardized Compliance Reporting
                                </li>
                                <li>
                                    <i class="bi-lock-fill" style="color:green;"></i>
                                    Universal Multifactor Authentication
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-info">
                        <div class="card-header">
                            <h3 class="text-center">Security Auditing
                            <i class="bi-shield-fill-exclamation" style="color:red;"></i>
                            </h3>
                        </div>
                        <div class="card-body">
                            <p class="text-center">
                                <img src="{{ asset('images/shield.gif') }}" class="m-auto row col-6">
                                Sophisticated Red Team security auditing by Security+ certified staff will reveal weaknesses in your organization and infrastructure according to your desired auditing scope in accordance with U.S. Department of Defense Directive 8140/8570.01-M IAM Level I:
                            </p>
                            <ul class="greencheck">
                                <li>
                                    <i class="bi-shield-fill-exclamation" style="color:red;"></i>
                                    24/7 Audit Management Via Your Bertram Technologies Account 
                                </li>
                                <li>
                                    <i class="bi-shield-fill-exclamation" style="color:red;"></i>
                                    Blackbox, Graybox and Whitebox Testing
                                </li>
                                <li>
                                    <i class="bi-shield-fill-exclamation" style="color:red;"></i>
                                    Application, Infrastructure, and Social Engineering Attacks
                                </li>
                                <li>
                                    <i class="bi-shield-fill-exclamation" style="color:red;"></i>
                                    Post-Attack Vulnerability Reporting and Patch Recommendations
                                </li>
                                <li>
                                    <i class="bi-shield-fill-exclamation" style="color:red;"></i>
                                    Ongoing Communication With Your Blue Team to Resolve Vulnerabilities
                                </li>
                                <li>
                                    <i class="bi-shield-fill-exclamation" style="color:red;"></i>
                                    Security and Confidentiality From Breach to Patch Date
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-info">
                        <div class="card-header">
                            <h3 class="text-center">Fully Managed Hosting
                            <i class="bi-person-fill"></i>
                            </h3>
                        </div>
                        <div class="card-body">

                                <p class="text-center">
                                <img src="{{ asset('images/person.gif') }}" class="m-auto row col-6">
                                    Our no-hassle, fully-managed hosting experience for your frontend or backend infrastructure is accessible on-demand; our sysadmins work all day, every day ensuring your mission-critical infrastructure is functioning properly at all hours, day or night:
                                </p>
                            <ul class="greencheck">
                                <li>
                                    <i class="bi-person-fill"></i>
                                    24/7 Support Ticket Management Via Your Bertram Technologies Account 
                                </li>
                                <li>
                                    <i class="bi-person-fill"></i>
                                    Month-to-Month Payment
                                </li>
                                <li>
                                    <i class="bi-person-fill"></i>
                                    Use Our Infrastructure or Delegate Yours For Us to Manage
                                </li>
                                <li>
                                    <i class="bi-person-fill"></i>
                                    High-Availability, Minimal Downtime
                                </li>
                                <li>
                                    <i class="bi-person-fill"></i>
                                    Regular, Secure and Redundant Data Backups
                                </li>
                                <li>
                                    <i class="bi-person-fill"></i>
                                    AWS GovCloud Available For Eligible Customers
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>


@endsection