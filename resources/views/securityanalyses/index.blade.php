@extends('layouts.app')

@section('content')

@foreach($securityAnalyses as $securityAnalysis)
<div class="card bg-info m-2">
    <div class="card-header text-center">
        <h4>Security Analysis | {{ $securityAnalysis->getCreatedAt() }}</h4>
    </div>
    <div class="card-body">
                <form action="{{ route('threatitems.store') }}" method="POST">
                @csrf
                <input type="hidden"value="{{ $securityAnalysis->id }}" name="security_analysis_id">
                <input type="hidden"value="{{ $securityAnalysis->operation->id }}" name="operation_id">
        <div class="row">
        <div class="col-md-3">    
                <div class="form-group">
                    Attack Severity:
                    <select class="form-control" name="severity">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">   
                Attack Surface: 
                <div class="form-group">
                    <select class="form-control" name="attack_surface">
                        <option value="database">Database</option>
                        <option value="application">Application</option>
                        <option value="api">API</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">    
                Attack Type:
                <div class="form-group">
                    <input type="text" class="form-control" name="attack_type" placeholder="Please describe the attack type...">
                </div>
                </form>
            </div>
            <div class="col-md-3">    
                Attack Description:
                <div class="form-group">
                    <textarea class="form-control" id="body" name="description" placeholder="Please describe in detail the attack concerned..."></textarea>
                </div>
                    <button type="submit" class="btn btn-dark text-info">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            @include('securityanalyses.include.threatitems.index')
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection