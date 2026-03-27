<h1>VIEW TEMPLATE ENG</h1>

{{-- Blade Template engine: là engine template của Laravel, giúp tách biệt phần logic xử lý dữ liệu và phần hiển thị
giao diện, giúp code dễ đọc, dễ bảo trì hơn --}}
{{-- Cú pháp Blade: sử dụng dấu {{ }} để hiển thị dữ liệu, sử dụng @ để gọi các directive của Blade như @if, @foreach,
@include, @extends, @section, @yield... --}}

{{-- Hiển thị dữ liệu từ controller truyền sang view --}}
{{-- nếu dùng {{ biến }} thì sẽ tự động escape các ký tự đặc biệt trong biến đó, còn nếu dùng {!! biến !!} thì sẽ không
escape, nên có thể hiển thị được các thẻ HTML trong biến đó --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- link bootstrap --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.rtl.min.css">
</head>

<body>
    {{-- <p>Biến data in ra là: {!! $data !!}</p>
    @if ($number > 15)
    <p>{!! $data !!} đẹp trai vl. Mấy con gà biết gì</p>
    @elseif ($number == 5)
    <p>{!! $data !!} wowwww</p>
    @else
    <p>{!! $data !!} phải {{ $number }} cm. Mấy con gà biết gì</p>
    @endif --}}

    {{-- @for ($i = 0; $i < 10; $i++) <p>Số lần lặp: {{ $i }}</p>
        @endfor --}}

        {{-- @foreach ($array as $item) --}}
        {{-- <p>{{ $item }}</p> --}}
        {{-- <li>{{ $item }}</li> --}}
        {{-- @endforeach --}}

        {{-- Bài 16: Blade Template 2 - kế thừa template cha --}}
        <h2>Kết thừa template</h2>
        <div class="container">
            @yield('content')
        </div>
</body>

</html>