@extends('layouts.app')

@section('content')
@foreach($repos as $repo)
    <div class="card bg-info">
        <div class="card-header text-center">
            <h3>{{ ucwords($repo->repo_type) }} Git Repo | Client Application {{ $repo->parent_ref_id }}</h3>
        </div>
        <div class="card-body">
<form action="{{ route('repos.update', [$repo]) }}" method="POST">
@method('PUT')
@csrf
            <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    Repo Type:
                    <select class="form-control" name="repo_type" value="{{ $repo->repo_type }}">
                        <option value="website">Website</option>
                        <option value="mobile app">Mobile App</option>
                    </select>
            <button class="btn btn-dark text-info m-2" type="submit">Update Repo</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    Repo URL:
                    <input class="form-control" type="text" name="repo_url" value="{{ $repo->repo_url }}" placeholder="Repo URL...">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    Latest Commit:
                    <input class="form-control" type="text" name="latest_commit" value="{{ $repo->latest_commit }}" placeholder="Latest Commit...">
                </div>
            </div>
</form>
        </div>
            <form action="{{ route('bugs.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $repo->id }}" name="repo_id">
            <div class="row">
                <div class="col">
                    <div class="card bg-info">
                        <div class="card-header text-center">
                        <h3>Bug Tracker</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    Branch:
                                        <input class="form-control" type="text" name="branch" placeholder="Git branch containing this bug...">
                                <button class="btn btn-dark text-info m-2 mr-auto">Submit</buton>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    Severity:
                                        <select class="form-control" name="severity">
                                            <option value="low">Low</option>
                                            <option value="medium">Medium</option>
                                            <option value="high">High</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    Description:
                                        <input class="form-control" type="text" name="description" placeholder="Description of the bug...">
                                    </div>
                                </div>
                            </div>
                                </form>
                            <div class="row">
                                <div class="card card-limited bg-info col-md-6">
                                    <div class="card-header bg-danger text-center text-light">
                                        <h3>Open</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>
                                                        Branch:
                                                    </td>
                                                    <td>
                                                        Description:
                                                    </td>
                                                    <td>
                                                        Severity:
                                                    </td>
                                                    <td>
                                                        Status:
                                                    </td>   
                                                </tr>                                                 
                                            @include('repos.include.bugs.show_open')
                                            </table>
                                        </div>                                    
                                    </div>
                                </div>
                                <div class="card card-limited bg-info col-md-6">
                                    <div class="card-header bg-success text-center">
                                        <h3>Closed</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>
                                                        Branch:
                                                    </td>
                                                    <td>
                                                        Description:
                                                    </td>
                                                    <td>
                                                        Severity:
                                                    </td>
                                                    <td>
                                                        Status:
                                                    </td>   
                                                </tr>
                                            @include('repos.include.bugs.show_closed')
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endforeach
@endsection