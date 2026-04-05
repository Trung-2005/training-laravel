<style>
    .login-admin input {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .login-admin label {
        display: inline-block;
        margin-bottom: 10px;
    }

    .login-admin button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-admin {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
<div class="login-admin">
    <h2 class="text-center">Admin Login</h2>
    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <input type="email" name="email" id="email" placeholder="Nhập email" value="{{ old('email') }}">
        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
        <label for=""><input type="checkbox" style="display: inline-block" name="remember">Remember password</label>
        <button type="submit">Login admin</button>
    </form>
</div>