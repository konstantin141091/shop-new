<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Башкирские колбасы">
    <meta name="keywords" content="Башкирские колбасы, колбасятина">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,600,700,900&amp;subset=cyrillic,latin&amp;display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div id="app">
    <div class="wrap">
        <div class="wrapper-layout">
            <div class="header__content">
                <header class="header">
                    <div class="header__top">
                        <div class="header__flex container">
                            <nav class="header__navbar">
                                <ul class="header__menu">
                                    <li class="menu__item">
                                        <a href="{{ route('index') }}" class="menu__link">Главная</a>
                                    </li>
                                    <li class="menu__item">
                                        <a href="{{ route('category.index') }}" class="menu__link">Каталог</a>
                                    </li>
                                    <li class="menu__item">
                                        <a href="{{ route('about') }}" class="menu__link">О компании</a>
                                    </li>
                                    <li class="menu__item">
                                        <a href="{{ route('contacts') }}" class="menu__link">Контакты</a>
                                    </li>
                                    <li class="menu__item">
                                        <a href="{{ route('delivery') }}" class="menu__link">Доставка и оплата</a>
                                    </li>

                                    @guest
                                        <li class="menu__item">
                                            <a href="{{ route('login') }}" class="menu__link">Войти</a>
                                        </li>

                                    @else
                                        <li class="menu__item">
                                            <a href="/" class="menu__link">Личный кабинет</a>
                                        </li>
                                        <li class="menu__item">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Выйти
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    @endguest
                                </ul>
                            </nav>
                            <p class="header__work-time">Доставка с 9:00 до 22:00</p>
                            <div class="header__phone">
                                <a class="header__phone-value" href="tel:+78008008080">+7(3519)46-66-11</a>
                            </div>
                        </div>
                    </div>
                    <div class="header__bottom container">
                        <div class="header__logo">
                            <a href="{{ route('index') }}" class="navbar-brand">
                                <img src="{{ asset('/storage/images/logo.png') }}" alt="Logo">
                            </a>
                        </div>

                        <div class="header__search">
                            <form action="{{ route('product.search') }}" method="GET" class="header__search-form">
{{--                                @csrf--}}
                                <input type="text" class="header__search-input" placeholder="Поиск"
                                       name="product_search" list="products_search">
                                <datalist id="products_search">
                                    @foreach($search_products as $product)
                                        <option value="{{ $product->name }}"></option>
                                    @endforeach
                                </datalist>

                                <button type="submit" class="header__search-btn">
                                    <img src="{{ asset('/storage/icons/search_white.svg') }}" alt="найти">
                                </button>
                            </form>
                        </div>

                        <div class="header__controls">
                            @auth
                                <a href="/">
                                    <img src="{{ asset('/storage/icons/person_black.svg') }}" alt="аккаунт">
                                </a>
                            @endauth
                            <header-cart-component :mobile="0" :url="'{{ route('cart') }}'"></header-cart-component>
                        </div>
                    </div>
                </header>

                <header class="header__mobile container">
                    <button class="header__button-menu">
                        <span class="material-icons">menu</span>
                    </button>
                    <div class="header__logo">
                        <a href="{{ route('index') }}" class="navbar-brand">
                            <img src="{{ asset('/storage/images/logo.png') }}" alt="Logo">
                        </a>
                    </div>
                    <div class="header__controls">
                        <header-cart-component :mobile="1" :url="'{{ route('cart') }}'"></header-cart-component>
                    </div>
                </header>
            </div>
            <main class="main-layout">
                @yield('content')
            </main>
            <footer>
                <div class="footer__top">
                    <div class="footer__area-menu container">
                        <div class="footer-menu__item">
                            <div class=footer-"menu__title">
                                <p>О магазине</p>
                                <button>
                                    <span class="material-icons">keyboard_arrow_down</span>
                                </button>
                            </div>

                            <a href="/" class="footer-menu__link">Адреса магазинов</a>
                            <a href="/" class="footer-menu__link">Акции и скидки</a>
                            <a href="/" class="footer-menu__link">Юридическим лицам</a>
                            <a href="/" class="footer-menu__link">Как заказать</a>
                            <a href="/" class="footer-menu__link">Обмен и возврат</a>
                        </div>

                        <div class="footer-menu__item">
                            <div class="footer-menu__title">
                                <p>Покупателям</p>
                                <button>
                                    <span class="material-icons">keyboard_arrow_down</span>
                                </button>
                            </div>

                            <a href="/" class="footer-menu__link">Личный кабинет</a>
                            <a href="/" class="footer-menu__link">Мои заказы</a>
                            <a href="{{ route('return_policy') }}" class="footer-menu__link">Политика возврата</a>
                        </div>

                        <div class="footer-menu__item">
                            <div class="footer-menu__title">
                                <p>Информация</p>
                                <button>
                                    <span class="material-icons">keyboard_arrow_down</span>
                                </button>
                            </div>

                            <a href="/" class="footer-menu__link">Политика конфиденциальности и оферта</a>
                            <a href="{{ route('use_agreement') }}" class="footer-menu__link">Пользовательское соглашение</a>
                        </div>
                    </div>
                </div>

                <div class="footer__bottom">
                    <p>&copy;2021&nbsp;Любое использование контента без письменного разрешения
                        запрещено</p>
                </div>
            </footer>
        </div>
    </div>
</div>
</body>
</html>
