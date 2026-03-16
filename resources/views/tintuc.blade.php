<h1>VIEW TIN TỨC</h1>

{{-- <form action="<?php route('post-new-tin-tuc'); ?>" method="POST"></form> --}}
<form action="{{ route('post-new-tin-tuc') }}" method="POST">
    {{-- @csrf: sinh token bảo mật cho form khi gửi dl lên server --}}
    @csrf
    <input type="text" name="fullname" placeholder="Họ tên">
    <button type="submit">Gửi</button>
</form>


{{-- Bài 9 --}}
{{-- <form action="{{ route('user-put') }}" method="POST"> --}}
    {{-- trong HTML chỉ hỗ trợ 2 method là GET và POST, nếu muốn sử dụng PUT, DELETE thì phải dùng @method để giả lập method đó --}}
    {{-- @method('PUT') --}}
    {{-- @csrf --}}
    {{-- <input type="text" name="fullname" placeholder="Họ tên"> --}}
    {{-- <button type="submit">Gửi</button> --}}
{{-- </form> --}}
