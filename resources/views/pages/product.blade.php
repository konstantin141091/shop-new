@extends('layouts.main')

@section('content')
<div class="container">
    <div class="flex-box">
        <div class="left">
            <img src="{{ asset('/storage/images/products/' . $product->img) }}" alt="{{ $product->name }}">
        </div>
        <div class="right product">
            <h1 class="product__title">{{ $product->name }}</h1>
            <div class="product__info">
                <div class="product__buy">
                    <p class="product__price">{{ $product->price }} руб.</p>
{{--                    <Button--}}
{{--                            btnClass="product__btn"--}}
{{--                            btnText="В корзину"--}}
{{--                            @click="addToCart"--}}
{{--                    />--}}
                </div>

                <div class="product__description">
                    <div>
                        <h3>Описание</h3>
                        <p>{{ $product->description }}</p>
                    </div>

                    <div>
                        <h3>Характеристики</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, vel.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
