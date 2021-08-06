@extends('layouts.main')

@section('content')
  <div class="container">
    <div class="catalog__top">
      <h1 class="catalog__title">{{ $category_name }}</h1>

    <!--            <div class="catalog__select">
                <select
                        class="select"
                        name="Сортировка"
                        v-model="sortType"
                        @click="sortItem()"
                >
                    <option
                            v-for="item in itemsSort"
                            :key="item.value"
                            :value="item.value"
{{--                    >{{ item.title }}--}}
      </option>

  </select>
</div>-->

    </div>

    <div class="flex-box">
      <aside class="catalog__aside aside">
        <h3 class="aside__title">Виды колбасы</h3>
        <ul class="aside__categories">
          @foreach($categories as $category)
            <li class="category__list">
              <a href="{{ route('category.show', $category) }}">
                {{ $category->name }}
              </a>
            </li>
          @endforeach
        </ul>
      </aside>

      <main class="catalog__main">
        <div>
          <catalog-list-component
            :products="{{ json_encode($products_list) }}"
            :url="'{{ route('product.index') }}'">
          </catalog-list-component>
          <div>
            {{ $products->links() }}
          </div>

        </div>
      </main>
    </div>
  </div>
@endsection
