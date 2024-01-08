@extends('layouts.app')
@section('title-block')Регистрация@endsection
@section('content')
    <form method="post" action="{{ route('register-form') }}">
        @csrf
        <div class="authRegister">
            <label for="login">Введите Email:</label>
            <input type="text" name="email" id="login" placeholder="Email" class="auth-register-form" style="width: 600px"><br>

            <div class="password-container">
            <label for="password">Введите пароль:</label>
            <input type="password" name="password" id="password" placeholder="Пароль" class="auth-register-form" style="width: 600px"><br>
            <span class="toggle-password" onclick="togglePassword()">👁</span>
            </div>

            <button type="submit" class="authRegisterButton" id="registButton" name="register">Зарегистрироваться</button>
        </div>
    </form>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection

