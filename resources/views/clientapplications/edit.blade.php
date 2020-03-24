@extends('layouts.app')

@section('content')

    <h1 class="text-center">Edit Client Information</h1>
    <form action={{ route('clientapplications.update', [$clientapplication->ref_id]) }} method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" name="name" value="{{ $clientapplication->name }}" placeholder="Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" name="company" value="{{ $clientapplication->company }}" placeholder="Company Name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" name="email" value="{{ $clientapplication->email }}" placeholder="Email Address">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" name="number" value="{{ $clientapplication->number }}" placeholder="Phone Number">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <select class="form-control" name="selection" value="{{ $clientapplication->selection }}">
                            <option value="Web Design/Development">Website Design/Development</option>
                            <option value="DevOps Management">DevOps</option>
                            <option value="Security Analysis">Security Analysis</option>
                            <option value="Custom Proposal">Custom Proposal</option>
                            <option value="Legacy Code">Legacy Code</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control" name="status" value="{{ $clientapplication->status }}" placeholder="A brief description of your project... preexisting or new site? Budgetary and time constraints? Biggest challenges so far?...">
                            <option value="follow-up">Follow Up</option>
                            <option value="on-time">On-Time</option>
                            <option value="late">Late</option>
                            <option value="urgent">Urgent</option>
                            <option value="unpaid">Unpaid</option>
                            <option value="complete">Complete</option>
                        </select>
                    </div>
                </div>    
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                <textarea class="form-control" id="project_show" name="project"> {{ $clientapplication->project }} </textarea>
                </div>
            </div>
        </div>

        
            <button type="submit" class="btn btn-dark text-info m-1 ">
                    Submit Client Information
            </button>
    </form>
        <form action={{ route('clientapplications.destroy', [$clientapplication->ref_id]) }} method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark text-info m-1" >Delete</button>
            </div>
        </form>
        </div>
    </div>

@endsection