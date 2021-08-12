@extends('layouts.main')

@section('content')
    <div class="container account">
        <nav class="account__menu">
            <ul>
                <li class="account__li"><a href="{{ route('account.index') }}" class="account__link">Мои данные</a></li>
                <li class="account__li"><a href="{{ route('account.orders') }}" class="account__link">История заказов</a></li>
{{--                <template v-if="isAdmin">--}}
{{--                    <li class="account__li"><router-link to="/account/admin" class="account__link">Админ панель</router-link></li>--}}
{{--                    <li class="account__li"><router-link to="/account/admin/product" class="account__link">Админ продукты</router-link></li>--}}
{{--                    <li class="account__li"><router-link to="/account/admin/category" class="account__link">Админ категории</router-link></li>--}}
{{--                </template>--}}
{{--                <li class="account__li"><a href="#" @click.prevent="signOut" class="account__link">Выйти</a></li>--}}
            </ul>
        </nav>

        <div class="profile">
{{--            TODO стилизовать сообщения ошибки и успеха--}}
                @if(session('success'))
                    <div class="alert-msg">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert-msg">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif
            <h1 class="profile__title">Данные профиля</h1>
            <form action="{{ route('account.update') }}" method="POST" class="login__form">
                @csrf
                <div class="login__group">

                    <label for="name" class="login__label">Имя</label>
                    <input type="text" name="name" id="name" class="login__input" placeholder="Имя" value="{{ $user->name }}">

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
                    <input type="email" name="email" id="email" class="login__input" placeholder="Email" value="{{ $user->email }}">
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
                    <input type="tel" name="phone" id="phone" class="login__input login__input-phone" placeholder="9225663344" value="{{ $user->phone }}">
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

                <check-address-component></check-address-component>

                <div id="check_address_block"  @if($errors->has('address') || $errors->has('location'))  @else class="d-n" @endif>
                    <div class="login__group">
                        <label for="location" class="login__label">Населённый пункт</label>
                        <input type="text" name="location" list="locations" id="location" class="login__input" placeholder="Населённый пункт" value="{{ $user->location }}">
                        <datalist id="locations">
                            <option value="Чита"></option>
                            <option value="Чита2"></option>
                            <option value="Москва"></option>
                        </datalist>
                        @if($errors->has('location'))
                            <div class="login__validate">
                                @foreach($errors->get('location') as $err)
                                    <div class="validate">
                                        <p class="validate__message">{{ $err }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="login__group">
                        <label for="address" class="login__label">Адрес доставки</label>
                        <input type="text" name="address" id="address" class="login__input" placeholder="Адрес доставки" value="{{ $user->address }}">
                        @if($errors->has('address'))
                            <div class="login__validate">
                                @foreach($errors->get('address') as $err)
                                    <div class="validate">
                                        <p class="validate__message">{{ $err }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <check-password-component></check-password-component>

                <div id="check_password_block" @if(session('oldPassword') || $errors->has('newPassword'))  @else class="d-n" @endif>
                    <div class="login__group">
                        <label for="oldPassword" class="login__label">Текущий пароль</label>
                        <input type="password" name="oldPassword" id="oldPassword" class="login__input" placeholder="Текущий пароль">
                        @if(session('oldPassword'))
                            <div class="login__validate">
                                <div class="validate">
                                    <p class="validate__message">{{ session('oldPassword') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="login__group">
                        <label for="newPassword" class="login__label">Новый пароль</label>
                        <input type="password" name="newPassword" id="newPassword" class="login__input" placeholder="Новый пароль">
                        @if($errors->has('newPassword'))
                            <div class="login__validate">
                                @foreach($errors->get('newPassword') as $err)
                                    <div class="validate">
                                        <p class="validate__message">{{ $err }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="login__group">
                        <label for="newPassword_confirmation" class="login__label">Повторите новый пароль</label>
                        <input type="password" name="newPassword_confirmation" id="newPassword_confirmation" class="login__input" placeholder="Повторите новый пароль">
                    </div>
                </div>
                <div class="login__btns">
                    <button type="submit" class="login__button">Сохранить изменения</button>
                </div>
            </form>
        </div>
    </div>
@endsection
