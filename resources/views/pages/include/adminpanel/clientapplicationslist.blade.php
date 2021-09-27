<div class="row mb-2">
    <div class="col-md-12">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>Client Applications List</h3>
            </div>
            <div class="card-body">
                @if($clientApplications->count() > 0)
                    @foreach($clientApplications as $clientApplication)
                            <div class="col">
                                <div class="card bg-info">
                                    <div class="card-header">
                                        <div class="row mb-2">
                                        <h3 class="m-auto">{{ $clientApplication->first_name . ' ' . $clientApplication->last_name . ' ' . $clientApplication->ref_id }}</h3><h3>Project Status: {{ $clientApplication->getProjectStatus() }}</h3>
                                        <form class="ml-auto" action="{{ route('clientapplications.show', [$clientApplication]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="clientApplication" value="{{ $clientApplication->id }}">
                                            <button class="btn btn-dark text-info" type="submit">
                                                View
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md">
                                                Project Type: {{ $clientApplication->project_type }}
                                            </div>
                                            <div class="col-md">
                                                Due Date: {{ $clientApplication->getDueDate() }}
                                            </div>        
                                            <div class="col-md">

                                            </div>        
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md">
            
                                            </div>
                                            <div class="col-md">
                
                                            </div>
                                            <div class="col-md">
                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>