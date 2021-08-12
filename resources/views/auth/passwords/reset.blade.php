@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="login__title">Восстановление пароля</h1>
    <form action="{{ route('password.update') }}" method="POST" class="login__form">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="login__group">
            <label for="email" class="login__label">Email</label>
            <input type="email" name="email" id="email" class="login__input" placeholder="Email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <div class="login__validate">
                <div class="validate">
                    <p class="validate__message">{{ $message }}</p>
                </div>
            </div>
            @enderror
        </div>

        <div class="login__group">
            <label for="password" class="login__label">Новый пароль</label>
            <input type="password" name="password" id="password" class="login__input" placeholder="Новый пароль" required autocomplete="new-password">
            @error('password')
            <div class="login__validate">
                <div class="validate">
                    <p class="validate__message">{{ $message }}</p>
                </div>
            </div>
            @enderror
        </div>

        <div class="login__group">
            <label for="password-confirm" class="login__label">Повторите пароль</label>
            <input type="password" name="password_confirmation" id="password-confirm" class="login__input" placeholder="Повторите пароль" required autocomplete="new-password">
        </div>
        <div class="login__btns">
            <button type="submit" class="login__button">Восстановить</button>
        </div>
    </form>
</div>
@endsection
