@extends('layouts.main')

@section('content')
    <div class="container account">
        <nav class="account__menu">
            <ul>
                <li class="account__li"><a href="{{ route('account.index') }}" class="account__link">Мои данные</a></li>
                <li class="account__li"><a href="{{ route('account.orders') }}" class="account__link">История заказов</a></li>
            </ul>
        </nav>

        <div class="profile">
            <h1 class="profile__title">Мои заказы</h1>

            @forelse($orders as $order)
                <div class="d-flex">

                    <div>
                        <p>Номер заказа: {{ $order->id }}</p>
                    </div>

                    <div>
                        <p>Адрес доставки: {{ $order->location }}, {{ $order->address }}</p>
                    </div>

                    <div>
                        <p>Сумма заказа: {{ $order->total_price }}</p>
                    </div>

                    <div>
                        <p>Дата заказа: {{ $order->created_at }}</p>
                    </div>

                    <div>
                        <p>Статус заказа: {{ $order->status }}</p>
                    </div>

                    <div>
                        <a href="{{ route('account.order.show', $order->id) }}">Подробнее</a>
                    </div>

                </div>
                <hr>
            @empty
                <p>Нет заказов</p>
            @endforelse
        </div>
    </div>
@endsection
