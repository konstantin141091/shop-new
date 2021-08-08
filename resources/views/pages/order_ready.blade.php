@extends('layouts.main')

@section('content')
    <div class="container order">
        <h1 class="order__title">Заказ №{{ $order->id }}</h1>

        <h3 class="order__subtitle">Информация о заказе</h3>

        <div class="order-info">
            <div class="order-row">
                <p class="order-info__title">Дата оформления</p>
                <p class="order-info__value">{{ $order->created_at }}</p>
            </div>

            <div class="order-row">
                <p class="order-info__title">Сумма</p>
                <p class="order-info__value">{{ $order->total_price + $order->delivery_cost }}&nbsp;руб</p>
            </div>

            <div class="order-row">
                <p class="order-info__title">Способ доставки</p>
                <p class="order-info__value">{{ $order->delivery_method }}</p>
            </div>

            <div class="order-row">
                <p class="order-info__title">Адрес доставки</p>
                <p class="order-info__value">{{ $order->address }}</p>
            </div>

            <div class="order-row">
                <p class="order-info__title">Получатель</p>
                <p class="order-info__value">{{ $order->name }}&nbsp;+7{{ $order->phone }}</p>
            </div>

        </div>

        <h3 class="order__subtitle">Состав заказа</h3>

        <table class="table">
            <tbody>
            <tr class="table-row table-row__head">
                <td class="table-cell table-cell__head">Наименование</td>
                <td class="table-cell table-cell__head">Кол-во</td>
                <td class="table-cell table-cell__head">Стоимость</td>
            </tr>
            @foreach($products_cart as $product)
                <tr class="table-row table-row__body">
                    <td class="table-cell table-cell__body" data-title="Наименование">{{ $product->name }}</td>
                    <td class="table-cell table-cell__body" data-title="Кол-во">{{ $product->quantity }}</td>
                    <td class="table-cell table-cell__body" data-title="Стоимость">{{ $product->price }}&nbsp;руб</td>
                </tr>
            @endforeach
            <tr class="table-row table-row__foot">
                <td class="table-cell table-cell__foot" colspan="3">Итого:&nbsp;<strong>{{ $order->total_price }}&nbsp;руб</strong></td>
            </tr>
            </tbody>
        </table>
        <clear-cart-component></clear-cart-component>
    </div>
@endsection
