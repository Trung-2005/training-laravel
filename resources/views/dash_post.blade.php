@can('update', $post)
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $post->title }}">
        <button type="submit">Update</button>
    </form>
@endcan

@cannot('update', $post)
<p>You do not have permission to edit this post.</p>
@endcannot