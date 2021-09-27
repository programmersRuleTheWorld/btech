<div class="row mb-2">
    <div class="col-md-6">
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">{{ $user->getName() }}<h/3>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">Client Applications<h/3>
            </div>
            <div class="card-body">
                @include('pages.include.adminpanel.clientapplicationslist')
            </div>
        </div>
    </div>
</div>