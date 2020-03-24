                        <div class="table-responsive">
                        <table class="table table-borderless table-sm table-hover  table-condensed">
                                        <tr class="text-center">
                                            <th>
                                                Post Title
                                            </th>
                                            <th>
                                                Published On
                                            </th>
                                            <th>
                                                <a class="btn btn-dark text-info" href="/posts/create">Create Post</a>
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                        @if(count($posts) > 0)
                                            @foreach($posts as $post)   
                                                <tr class="text-center">
                                                    @if(strlen($post->title) >= 26)
                                                    <td>
                                                        <a class="text-dark" href="/posts/{{ $post->post_id }}">
                                                        <u>{{ substr($post->title, 0, 25).'...' }}</u>
                                                        </a>
                                                    </td>
                                                    @else    
                                                    <td>
                                                        <a class="text-dark" href="/posts/{{ $post->post_id }}">
                                                            <b>{{ $post->title }}</b>
                                                        </a>
                                                    </td>
                                                    @endif
                                            <td>
                                                {{ $post->created_at }}
                                            </td>
                                                    <td>
                                                        <a class="btn btn-dark text-info" href="/posts/{{ $post->post_id }}">
                                                            Edit
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('posts.destroy', [$post->post_id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')                           
                                                                <button type="submit" class="btn btn-dark text-info" >Delete</button>
                                                        </form>
                                                    </td>
                                                    @endforeach
                                                </tr>
                                        @else
                                            <p class="text-center col-md-6">Nothing posted yet!</p>
                                        @endif
                                    </table>
                                </div>

                                    {{ $posts->links() }}
