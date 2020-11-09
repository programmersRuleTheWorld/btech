@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert flashy1 text-center mt-2">
            <h3><b>{{ $error }}</b></h3>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert flashy2 text-center mt-2">
    <h3><b>{{ session('success') }}</h3></b>
    </div>
@endif

@if(session('error'))
    <div class="alert flashy1 text-center mt-2">
    <h5><b>{{ session('error') }}</h5></b>
    </div>
@endif