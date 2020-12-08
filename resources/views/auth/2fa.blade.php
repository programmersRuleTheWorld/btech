@extends('layouts.app')

@section('content')

<div class="col-md-6 m-auto">
    <div class="card bg-info">
        <div class="card-header text-center">
            <h3>Two-Factor Authentication In Progress...</h3>
        </div>
        <div class="card-body">
            <div class="panel bg-info border border-dark m-3 p-1">
                        <b class="text-center">We recommend you always secure your e-mail account using 2FA methods such as hardware authentication keys or software authentication tokens. We do <u>not</u> recommend SMS authentication and do not implement SMS authentication in any of our infrastructure.</b>
                    </div>
            <form action="{{ route('2fa.verify') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="token">One-time password:</label>
                    <input type="text" name="token" placeholder="Please enter the one-time password that has been e-mailed to you..." class="form-control {{ $errors->has('token') ? ' is-invalid' : '' }}" id="token"> 
                    @if($errors->has('token'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('token') }}</strong>
                        </span> 
                    @endif
                    </div>
                <button class="btn btn-dark text-info" type="submit">Verify</button>
            </form>
        </div>
    </div>
</div>
@endsection