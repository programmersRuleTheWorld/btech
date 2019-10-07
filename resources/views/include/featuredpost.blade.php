    @if(count($posts) > 0)
            @foreach($posts as $post)
            <a class="" href="/posts/{{ $post->id }}">
                        <h5 class="text-center">The Latest From B-Tech</h5>
                    <div class="text-center">
                    @if(strlen($post->title) >= 30)
                    <h4>{{ substr($post->title, 0,29).'...' }}</h4>
                    Published by <b>{{ $post->user->name }}</b> on {{ $post->created_at }}
                    @else
                    <h4>{{ $post->title }}</h4>
                    Published by <b>{{ $post->user->name }}</b> on {{ $post->created_at }}
                    @endif
                    </div>
                    @if(strlen($post->body) >= 590)
                            <p>{{ substr($post->body, 0,589).'...' }}</p>
                    @else
                            <p>{{ $post->body }}</p>
                    @endif
        </a>
            @endforeach
        @endif