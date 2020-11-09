@extends('layouts.app')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">
                    Development Center
                </h3>
            </div>
            @include('pages.include.myjobs')
        </div>
    </div>
</div>

@endsection
