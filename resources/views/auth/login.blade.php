@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="login__title">Вход в кабинет покупателя</h1>
        <form action="{{ route('login') }}" method="POST" class="login__form">
            @csrf
            <div class="login__group">
                <label for="email" class="login__label">Email</label>
                <input type="email" name="email" id="email" class="login__input" placeholder="Email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="login__validate">
                        @foreach($errors->get('email') as $err)
                            <div class="validate">
                                <p class="validate__message">{{ $err }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="login__group">
                <label for="password" class="login__label">Пароль</label>
                <input type="password" name="password" id="password" class="login__input" placeholder="Пароль">
                @if($errors->has('password'))
                    <div class="login__validate">
                        @foreach($errors->get('password') as $err)
                            <div class="validate">
                                <p class="validate__message">{{ $err }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="login__btns">
                <button type="submit" class="login__button">Войти</button>
                <a href="{{ route('register') }}" class="login__href">Регистрация</a>
                <a href="/" class="login__href">Восстановить пароль</a>
            </div>
        </form>
    </div>
@endsection
