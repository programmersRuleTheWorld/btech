                    <h3 class="text-center">
                            My Posts
                        </h3>
                        <table class="table table-striped table-hover  table-condensed">
                                        <tr>
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
                                                <tr>
                                                    @if(strlen($post->title) >= 26)
                                                    <td>
                                                        <a class="text-dark" href="/posts/{{ $post->id }}">
                                                        <u>{{ substr($post->title, 0, 25).'...' }}</u>
                                                        </a>
                                                    </td>
                                                    @else    
                                                    <td>
                                                        <a class="text-dark" href="/posts/{{ $post->id }}">
                                                            <u>{{ $post->title }}</u>
                                                        </a>
                                                    </td>
                                                    @endif
                                            <td>
                                                {{ $post->created_at }}
                                            </td>
                                                    <td>
                                                        <a class="btn btn-dark text-info" href="/posts/{{ $post->id }}">
                                                            Edit
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('posts.destroy', [$post->id]) }}" method="POST">
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

                                    {{ $posts->links() }}
