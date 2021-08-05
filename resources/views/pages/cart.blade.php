@extends('layouts.main')

@section('content')
    <div class="container cart">
        <h1 class="cart__title">Корзина</h1>
        <cart-page-component
                :url_order="'{{ route('order.index') }}'" :url_product="'{{ route('product.index') }}'">
        </cart-page-component>

    </div>
@endsection
