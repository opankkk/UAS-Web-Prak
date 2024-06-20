@extends('Index')

@section('Login')

<div class="bodyLog">
    <div class="wrapperLog">
        @if (session('LoginError'))
        <div class="alert">
            {{ session('LoginError') }}
            <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>
  @endif

        <form action="/login" method="POST">
            @csrf   
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"/>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password"/>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-fotgot">
                <label>
                    <input type="checkbox">
                    Remember me
                </label>
                <a href="#">Lupa Password?</a>
            </div>

            <button type="submit" name="login" class="btnLog">Login</button>
            <div class="register-link">
                <p>Tidak memiliki akun?<a href="/Member">Register</a></p>
            </div>
        </form>
    </div>
</div>
    @endsection

