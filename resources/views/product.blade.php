{{-- Bài 12: Controller, View --}}

<h1>SỐ LƯỢNG SẢN PHẨM</h1>

<?php echo $soLuong; ?>

<form action="/product-quantity" method="POST">
    @csrf
    <input type="text" name="fullname" placeholder="Họ tên">
    <button type="submit">Gửi</button>
</form>