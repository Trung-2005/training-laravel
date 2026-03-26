@extends('template-eng')

@section('title', 'Layout cho blog')

@section('content')
    <h2>VIEW Blog</h2>
    <form action="/blade" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="fullname" placeholder="Họ tên">
        <input type="text" name="email" placeholder="Email">
        <button type="submit">Gửi</button>

    </form>
@endsection
