@extends('layouts.main')

@section('content')
  <div class="container">
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

      <form method="post" class="feedback__form" action="">

        <div class="feedback__fields">
          <div class="feedback__field feedback__inputs">
            <div class="feedback__name feedback__input">
              <input type="text" name="name" placeholder="Имя*">
            </div>
            <div class="feedback__mail feedback__input">
              <input type="email" name="email" placeholder="Ваша почта*">
            </div>
          </div>

          <div class="feedback__field feedback__text">
                        <textarea name="message" cols="30" rows="10" placeholder="Ваш вопрос, отзыв или пожелание*">
                        </textarea>
          </div>

          <input type="checkbox" name="agree_rules" id="agree_rules">
          <label for="agree_rules" class="agree-label">
            Настоящим подтверждаю, что я ознакомлен и согласен с условиями оферты и политики конфиденциальности *
          </label>

        </div>

        <div class="feedback__submit">
          <button type="submit" class="button feedback__btn">Отправить</button>
        </div>
      </form>
    </section>
  </div>
@endsection
