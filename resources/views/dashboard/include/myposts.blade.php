                                        <div class="row">
                                            <div class="col">
                                                Post Title
                                            </div>
                                            <div class="col">
                                                Published On
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-dark text-info" href="/posts/create">Create Post</a>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                        @if(count($posts) > 0)
                                            @foreach($posts as $post)   
                                                <div class="row">
                                                    @if(strlen($post->post_title) >= 26)
                                                    <div class="col">
                                                        <a class="text-dark" href="/posts/{{ $post->post_id }}">
                                                        <u>{{ substr($post->post_title, 0, 25).'...' }}</u>
                                                        </a>
                                                    </div>
                                                    @else    
                                                    <div class="col">
                                                        <a class="text-dark" href="/posts/{{ $post->post_id }}">
                                                            <b>{{ $post->post_title }}</b>
                                                        </a>
                                                    </div>
                                                    @endif
                                            <div class="col">
                                                {{ $post->created_at }}
                                            </div>
                                                    <div class="col">
                                                        <a class="btn btn-dark text-info" href="/posts/{{ $post->post_id }}/edit">
                                                            Edit
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{ route('posts.destroy', [$post->post_id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')                           
                                                                <button type="submit" class="btn btn-dark text-info" >Delete</button>
                                                        </form>
                                                    </div>
                                                    @endforeach
                                                </div>
                                        @else
                                            <p class="text-center col-md-6">Nothing posted yet!</p>
                                        @endif

                                    {{ $posts->links() }}
