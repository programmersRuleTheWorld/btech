                    @if(count($clientApplications) > 0)
                        @foreach($clientApplications as $clientApplication)   
                        <div class="row" class="text-center">
                            <div class="col">
                                Project Type: <u class="text-dark">{{ $clientApplication->project_type }}</u>
                            </div>
                            <div class="col">
                                Contact: {{ $clientApplication->email }}
                            </div>
                            <div class="col">
                                Status: 
                            </div>
                            <div class="col">
                                @include('clientapplications.include.clientapplication_status')
                            </div>
                            <div class="col">
                                Project Name: {{ $clientApplication->project_name }}
                            </div>
                                <div class="col">
                                @can('delete', $clientApplication)
                                <form action="{{ route('clientapplications.destroy', [$clientApplication->ref_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')                       
                                    <button type="submit" class="btn btn-dark text-info">Delete</button>
                                </form>
                                @endcan
                            </div>
                            <div class="col">
                            <a class="btn btn-dark text-info" href="{{ route('clientapplications.show', [$clientApplication]) }}">
                                View
                            </a>
                            </div>
                            </div>
                                @endforeach
                                @else
                        <p class="text-center col-md-6 m-auto">No projects located.</p>
                    @endif
                        {{ $clientApplications->links() }}