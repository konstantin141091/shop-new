@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="login__title">Восстановление пароля</h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('password.email') }}" method="POST" class="login__form">
        @csrf
        <div class="login__group">
            <label for="email" class="login__label">Email</label>
            <input type="email" name="email" id="email" class="login__input" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <div class="login__validate">
                    <div class="validate">
                        <p class="validate__message">{{ $message }}</p>
                    </div>
                </div>
            @enderror
        </div>
        <div class="login__btns">
            <button type="submit" class="login__button">Восстановить</button>
        </div>
    </form>
</div>
@endsection
