@extends('layouts.app')

@section('content')

<div class="col-6 form-group m-auto">
    <h1 class="text-center">Edit Client Information</h1>
    <form action="{{ route('clientapplications.update', [$clientapplication->ref_id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input class="form-control" name="name" value="{{ $clientapplication->name }}">
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-dark m-1 $blue">
                    Submit Client Information
            </button>
    </form>
        <form action="{{ route('clientapplications.destroy', [$clientapplication->ref_id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark m-1 $blue" >Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection