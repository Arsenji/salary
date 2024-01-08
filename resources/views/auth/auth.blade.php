@extends('layouts.app')
@section('title-block')Авторизация@endsection
@section('content')
    <form method="post" action="{{ route('auth-form') }}">
        @csrf
        <div class="authRegister">
            <label for="email">Введите email:</label>
            <input type="text" name="email" id="email" placeholder="Логин" class="auth-register-form" style="width: 600px"><br>

            <div class="password-container">
            <label for="password">Введите пароль:</label>
            <input type="password" name="password" id="password" placeholder="Пароль" class="auth-register-form" style="width: 600px"><br>
            <span class="toggle-password" onclick="togglePassword()">👁</span>
            </div>

            <button type="submit" id="authButton" class="authRegisterButton">Войти</button>
        </div>
    </form>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
