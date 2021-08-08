@extends('layouts.main')

@section('content')
    <div class="container checkout">
{{--        <div class="loader-wrapper"  v-show="loading">--}}
{{--            <Loader></Loader>--}}
{{--        </div>--}}
        <h1 class="checkout__title">Оформление заказа</h1>
        <div class="checkout__box">
            <form class="checkout__form" method="POST" action="{{ route('order.store') }}">
                @csrf
                <div class="checkout-block">

                    @if($errors->has('cart'))
                        <div class="login__validate">
                            <div class="validate">
                                <p class="validate__message">Для оформления заказа нужно добавить хотя бы один товар</p>
                            </div>
                        </div>
                    @endif

                    <h2 class="form__title">Контактные данные</h2>
                    <input type="hidden" name="cart" id="cart">
                    <label for="name">Контактное лицо (ФИО)</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}">
                    @if($errors->has('order.name'))
                        <div class="login__validate">
                            @foreach($errors->get('order.name') as $err)
                                <div class="validate">
                                    <p class="validate__message">{{ $err }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <label for="phone">Контактный телефон</label>
                    <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" placeholder="9145220980">
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


                <div class="checkout-block">
                    <h3 class="form__title">Доставка</h3>

                    <label for="address">Адрес доставки</label>
                    <input type="text" name="address" id="address" value="{{ old('address') }}"
                           placeholder="Челябинская область, г. Магнитогорск, ул. Полевая, д.0">
                    @if($errors->has('address'))
                        <div class="login__validate">
                            @foreach($errors->get('address') as $err)
                                <div class="validate">
                                    <p class="validate__message">{{ $err }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="form-item">
                        <input type="radio" name="delivery_method" id="pickup" value="самовывоз" class="form-radio" checked>
                        <label for="pickup" class="form-radio-label">Самовывоз</label>
                    </div>

                    <div class="form-item">
                        <input type="radio" name="delivery_method" id="deliveryByCourier" value="курьер" class="form-radio">
                        <label for="deliveryByCourier" class="form-radio-label">Курьером</label>
                    </div>

                    <label for="comment">Комментарии к заказу</label>
                    <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Ваш комментарий">
                        {{ old('comment') }}
                    </textarea>
                    @if($errors->has('comment'))
                        <div class="login__validate">
                            @foreach($errors->get('comment') as $err)
                                <div class="validate">
                                    <p class="validate__message">{{ $err }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Ваш email">
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

                <div class="checkout-block">
                    <h3 class="form__title">Способ оплаты</h3>
                    <p>Оплата производится наличными или по карте курьеру</p>
                </div>

                <button class="form__btn" type="submit">Подтвердить заказ</button>
            </form>

            <cart-item-list-component></cart-item-list-component>
        </div>

    </div>
@endsection
