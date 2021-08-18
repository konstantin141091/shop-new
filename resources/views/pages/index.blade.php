@extends('layouts.main')

@section('content')
  <div class="container">

{{--    TODO  модалка которую надо заверстать --}}
    <div style="
      position: fixed;
      border: solid 3px red;
      color: red;
      z-index: 999;
      top: 50%;
      right: 44%;" class="d-n" id="feedback-success">
      <p>Ваш запрос принят. Спасибо.</p>
    </div>

    {{--        Компонет главного слайдера переписать--}}
    <section class="promo">
      <div
        class="promo-info"
        style="background-image: url('{{asset('/storage/images/myaso_bs.jpg')}}');"
      >
        <h1>«Башкирские Колбасы»<br>Качественная продукция ГОСТ</h1>
        <p>Свежая, вкусная мясная продукция нашего магазина - отличный выбор к вашему столу. Все наши продукты
          готовятся
          по ГОСТу, поэтому клиенты нам доверяют!</p>

        <a href="{{ route('category.index') }}" class="button promo-btn">Смотреть каталог</a>

      </div>
    </section>

    <!--        <promo-component></promo-component>-->
    {{--        Новинки убираю, не будет в окончательной версии. Вью компонент оставить только у кнопки купить, чтобы была связь со стором

    --}}
    {{--        <new-arrival-component
                    :products="{{ $new_products }}"
                    :url="'{{ route('product.index') }}'">
            </new-arrival-component>--}}

    <section class="benefit-list">
      <h2 class="benefit-list__title">Наши плюсы</h2>

      <div class="benefit-list__box">
        <article class="benefit-list__article">
          <img src="{{ asset('/storage/icons/plus__1.svg') }}" alt="Широкий ассортимент">
          <h4>Широкий ассортимент</h4>
          <p>Мы закупаем колбасы от производителя. Более 400 видов колбасы
            представлены на наших прилавках.</p>
        </article>

        <article class="benefit-list__article">
          <img src="{{ asset('/storage/icons/plus__2.svg') }}" alt="Всегда свежие">
          <h4>Всегда свежие</h4>
          <p>Все продукты перевозятся в машинах-рефрижераторах с разными режимами температуры. Мы знаем, сколько
            градусов внутри каждой колбасы!</p>
        </article>

        <article class="benefit-list__article">
          <img src="{{ asset('/storage/icons/plus__3.svg') }}" alt="Контроль качества">
          <h4>Контроль качества</h4>
          <p>Мы контролируем качество – от поставщика до полки. Для хранения мы используем самое современное
            оборудование.</p>
        </article>
      </div>
    </section>

    <section class="promotions">
      <h2 class="promotions__title">Акции</h2>
      <div class="promotions__box">
        <article v-for="item in 4" class="promotions__article">
          <a href="#" class="promotions__img">
            <img src="{{ asset('/storage/images/products/Polukopchyonnaya_Armavarskaya_GOST.png') }}"
                 alt="Полукопчённая Армаварская ГОСТ">
          </a>
          <div>
            <h4>
              <a href="#">Скидка на Полукопчённая Армаварская ГОСТ</a>
            </h4>
            <!--                    <p class="promotions__date-range">c 10.04.2021 по 10.05.2021</p>-->
            <p class="promotions__date">10.04.2021</p>
          </div>
        </article>
      </div>
    </section>

    {{--        Форму отправки нужно подредактировать и перенести все стили из вью компаненте--}}
    <section class="feedback">
      <h2 class="feedback__title">Обратная связь</h2>

      <form method="POST" class="feedback__form">
{{--        @csrf--}}
        <div class="feedback__fields">
          <div class="feedback__field feedback__inputs">
            <div class="feedback__name feedback__input">
              <input type="text" name="name" placeholder="Имя*" value="{{ old('name') }}" id="feedback-name-input">
              <div class="login__validate d-n" id="feedback-name">
                  <div class="validate">
                    <p class="validate__message" id="feedback-name-msg"></p>
                  </div>
              </div>
            </div>
            <div class="feedback__mail feedback__input">
              <input type="email" name="email" placeholder="Ваша почта*" value="{{ old('email') }}" id="feedback-email-input">

              <div class="login__validate d-n" id="feedback-email">
                  <div class="validate">
                    <p class="validate__message" id="feedback-email-msg"></p>
                  </div>
              </div>

            </div>
          </div>

          <div class="feedback__field feedback__text">
            <textarea name="text" cols="30" rows="10" placeholder="Ваш вопрос, отзыв или пожелание*" id="feedback-text-input">

            </textarea>

            <div class="login__validate" id="feedback-text">
              <div class="validate">
                <p class="validate__message" id="feedback-text-msg"></p>
              </div>
            </div>

          </div>

          <input type="checkbox" name="agree" id="agree_rules">
          <label for="agree_rules" class="agree-label" id="feedback-agree">
            Настоящим подтверждаю, что я ознакомлен и согласен с условиями оферты и политики конфиденциальности *
          </label>
        </div>

        <feedback-component :url="'{{ route('feedback') }}'"></feedback-component>
      </form>
    </section>
  </div>
@endsection
