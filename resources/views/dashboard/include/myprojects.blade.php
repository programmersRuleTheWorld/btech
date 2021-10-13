                    @if(count($clientApplications) > 0)
                        @foreach($clientApplications as $clientApplication)   
                        <div class="row" class="text-center">
                            <div class="col">
                                Project Type: <u><a class="text-dark" href="{{ route('clientapplications.show', [$clientApplication]) }}">{{ $clientApplication->project_type }}</a></u>
                            </div>
                            <div class="col">
                                Contact: {{ $clientApplication->email }}
                            </div>
                                Status: @include('include.status')
                                <div class="col m-auto">
                                @can('delete', $clientApplication)
                                <form action="{{ route('clientapplications.destroy', [$clientApplication->ref_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')                       
                                    <button type="submit" class="btn btn-dark text-info">Delete</button>
                                </form>
                                @endcan
                                </div>
                            </div>
                                @endforeach
                                @else
                        <p class="text-center col-md-6">No projects located.</p>
                    @endif
                        {{ $clientApplications->links() }}