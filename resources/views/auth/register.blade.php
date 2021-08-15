@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="login__title">Регистрация</h1>
        <form action="{{ route('register') }}" method="POST" class="login__form">
            @csrf
            <div class="login__group">
                <label for="name" class="login__label">Имя</label>
                <input type="text" name="name" id="name" class="login__input" value="{{ old('name') }}" placeholder="Имя">
                    @if($errors->has('name'))
                    <div class="login__validate">
                        @foreach($errors->get('name') as $err)
                            <div class="validate">
                                <p class="validate__message">{{ $err }}</p>
                            </div>
                        @endforeach
                    </div>
                    @endif
            </div>
            <div class="login__group">
                <label for="email" class="login__label">Email</label>
                <input type="email" name="email" id="email" class="login__input" value="{{ old('email') }}" placeholder="Email">
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
            <div class="login__group login__group-phone">
                <label for="phone" class="login__label">Телефон</label>
                <span class="login-phone-7">+7</span>
                <input type="tel" name="phone" id="phone" class="login__input login__input-phone" value="{{ old('phone') }}" placeholder="9000000000">
                @if($errors->has('phone'))
                    <div class="login__validate">
                        @foreach($errors->get('phone') as $err)
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
            <div class="login__group">
                <label for="password-confirm" class="login__label">Повторите пароль</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="login__input" placeholder="Повторите пароль">
            </div>
            <div class="login__btns">
                <button class="button login__button" type="submit">Зарегистрироваться</button>
                <a href="{{ route('login') }}" class="login__href">У меня уже есть аккаунт</a>
            </div>

          <check-phone-component></check-phone-component>
        </form>
    </div>
@endsection
