<h1>Create posts</h1>
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div>
        <input name="title" type="text" value="{{ old('title') }}">
    </div>
    <div>
        <textarea name="content">{{ old('content') }}</textarea>
    </div>
    <button type="submit">Lưu lại</button>
</form>