<div class="alert alert-{{ $type }}">
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    {{-- $slot: biến đặc biệt trong component, dùng để hiển thị nội dung được truyền vào component khi sử dụng, có thể
    hiểu là phần nội dung nằm giữa thẻ mở và thẻ đóng của component đó. Nếu không truyền nội dung nào thì $slot sẽ có
    giá trị mặc định là rỗng. --> --}}
    {{ $slot }}
</div>