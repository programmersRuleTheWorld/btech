@extends('layouts.app')

@section('content')
<input type="hidden" id="csrf" value="{{ csrf_token() }}">
<div class="card bg-info">
    <div class="card-header">
        <h1 class="text-center">Edit Client Information</h1>
    </div>
    <div class="card-body">
    <form action="{{ route('clientapplications.update', [$clientApplication->ref_id]) }}" method="POST">
        <input type="hidden" id="ref_id" name="ref_id" value="{{ $clientApplication->ref_id }}">
        @csrf
        @method('PUT')
        <div class="row mb-2">
            <div class="col-md-3">
                <div class="form-group">
                    Project Name:
                    <input class="form-control form-control-sm" name="project_name" value="{{ $clientApplication->project_name }}" placeholder="Project Name">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    First Name:
                    <input class="form-control form-control-sm" name="first_name" value="{{ $clientApplication->first_name }}" placeholder="First Name">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    Last Name:
                    <input class="form-control form-control-sm" name="last_name" value="{{ $clientApplication->last_name }}" placeholder="Last Name">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    Company Name:
                    <input class="form-control form-control-sm" name="company_name" value="{{ $clientApplication->company_name }}" placeholder="Company Name">
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-3">
                <div class="form-group">
                    Phone Number:
                    <input class="form-control form-control-sm" name="phone_number" value="{{ $clientApplication->phone_number }}" placeholder="Phone Number">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    Project Type:
                    <select class="form-control form-control-sm" name="project_type" value="{{ $clientApplication->project_type }}">
                            <option value="Web Design/Development">Website Design/Development</option>
                            <option value="DevOps Management">DevOps</option>
                            <option value="Security Analysis">Security Analysis</option>
                            <option value="Custom Proposal">Custom Proposal</option>
                            <option value="Legacy Code">Legacy Code</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                    <div class="form-group">
                        Project Status:
                        <select class="form-control form-control-sm" name="project_status" value="{{ $clientApplication->project_status }}" placeholder="A brief description of your project... preexisting or new site? Budgetary and time constraints? Biggest challenges so far?...">
                            <option value="follow-up">Follow Up</option>
                            <option value="on-time">On-Time</option>
                            <option value="late">Late</option>
                            <option value="urgent">Urgent</option>
                            <option value="unpaid">Unpaid</option>
                            <option value="complete">Complete</option>
                            <option value="refund">Refund</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">    
                    <div class="form-group">
                        Project Due Date:
                        <input type="text" class="form-control form-control-sm due-date" value="{{ $clientApplication->due_date }}"  name="due_date" placeholder="Click to open calendar">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">
                    <div class="form-group">
                        E-mail Address:
                        <input class="form-control form-control-sm" name="email" value="{{ $clientApplication->email }}" placeholder="Email Address">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        Project Deposit Rate:
                        <input type="text" class="form-control form-control-sm" name="project_deposit_rate" value="{{ $clientApplication->project_deposit_rate }}">
                    </div>
                </div>
            </div>
        <div id="wrapper">
        </div>
        <div class="row mb-2">
            <div class="col">
                <div class="form-group">
                    <textarea class="form-control form-control-sm" id="project_show" name="project_description"> {{ $clientApplication->project_description }} </textarea>
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-dark text-info m-1">
                    Submit Client Information
            </button>
    </form>
    @can('delete', $clientApplication)
        <form action="{{ route('clientapplications.destroy', [$clientApplication->ref_id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark text-info m-1" >Delete</button>
        </form>
    @endcan
    </div>

@endsection