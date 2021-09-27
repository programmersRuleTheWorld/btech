
                    <div class="row">
                        <div class="form-group m-1 col-md-4">
                            <form action="{{ route('repos.index') }}" method="GET">
                                @csrf
                                <input type="hidden" name="ref_id" value="{{ $clientApplication->ref_id }}">
                                @if($clientApplication->repos->count() > 0)
                                <button class="btn btn-dark text-info" type="submit">View Repos</button>
                                @else
                                <button class="btn btn-dark text-info disabled">View Repos</button>
                                @endif
                            </form>
                            </div>

                            <div class="form-group m-1 col-md-4">

                            <form action="{{ route('operations.index') }}" method="GET">
                                @csrf
                                <input type="hidden" name="ref_id" value="{{ $clientApplication->ref_id }}">
                                @if($clientApplication->operations->count() > 0)
                                <button class="btn btn-dark text-info" type="submit">View Ops</button>
                                @else
                                <button class="btn btn-dark text-info disabled">View Ops</button>
                                @endif
                            </form>
                            </div>

                            <div class="form-group m-1 col-md-4">

                            <form action="{{ route('repos.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="ref_id" value="{{ $clientApplication->ref_id }}">
                                <button class="btn btn-dark text-info" type="submit">Generate Repo</button>
                            </form>
                            </div>
                            <div class="form-group m-1 col-md-4">
                            <form action="{{ route('operations.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="ref_id" value="{{ $clientApplication->ref_id }}">
                                <button class="btn btn-dark text-info" type="submit">Generate Op</button>
                            </form>
                            </div>
                    </div>