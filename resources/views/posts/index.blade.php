<h1>Posts</h1>

@auth
    <a href="{{ route('posts.create') }}">Create</a>
@endauth

<ul>
    @foreach ($posts as $post)
        <li>
            <h3><a href="{{ route('posts.show', $post) }}">Bài viết: {{ $post->title }}</a></h3>
            <a href="{{ route('posts.edit', $post) }}">Edit</a>

            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>