<h1>Edit</h1>
<form method="POST" action="{{ route('posts.update', $post) }}">
    @csrf
    @method('PUT')
    <div>
        <input name="title" type="text" value="{{ old('title', $post->title) }}">
    </div>
    <div>
        <textarea name="content">{{ old('content', $post->content) }}</textarea>
    </div>
    <button type="submit">Update</button>
</form>