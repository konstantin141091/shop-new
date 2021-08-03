<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert($this->getData());
    }

    private function getData() {
        $data = [
            [
                'name' => 'Старомосковская вареная копченая',
                'unit' => 'уп',
                'sale' => 5,
                'news' => true,
                'price' => 200,
                'img' => 'Staromoskovskaya_varyono_kopchyonnaya.png',
                'description' => 'product description ',
                'shelf_life' => 'product shelf_life ',
                'category_id' => rand(1, 4)
            ],
            [
                'name' => 'Охотничие колбаски ГОСТ',
                'unit' => 'шт',
                'sale' => 5,
                'news' => true,
                'price' => 600,
                'img' => 'Ohotnich_kolbaski_GOST.png',
                'description' => 'свинина, говядина, шпик, посолочная
смесь(соль поваренная пищевая, фиксатор окраски
Е 250), пищевые добавки(антиокислитель Е 300,
усилитель вкуса и аромата Е 621,регулятор
кислотности Е 325), чеснок свежий, пряности,
сахар-песок.',
                'shelf_life' => 'product shelf_life ',
                'category_id' => rand(1, 4)
            ],
            [
                'name' => 'Колбаса вареная Молочная',
                'unit' => 'шт',
                'sale' => 15,
                'news' => true,
                'price' => 150,
                'img' => 'Kolbasa_varennaya_Molochnaya.png',
                'description' => 'product description ',
                'shelf_life' => 'product shelf_life ',
                'category_id' => rand(1, 4)
            ],
            [
                'name' => 'Сосиски Кроха',
                'unit' => 'шт',
                'sale' => 10,
                'news' => true,
                'price' => 100,
                'img' => 'Sosiski_kroha.png',
                'description' => 'Состав: свинина, говядина, вода питьевая,
молоко сухое, посолочная смесь(соль поваренная
пищевая, фиксатор окраски Е 250), яичный
порошок, комплексная пищевая добавка
(стабилизаторы Е 450, Е 451, пряности и экстракты
пряностей, усилитель вкуса и аромата глутамат
натрия, антиоксидант- аскорбиновая кислота).',
                'shelf_life' => 'product shelf_life ',
                'category_id' => rand(1, 4)
            ],
        ];

        for ($i = 0; $i < 60; $i++) {
            $data[] = [
                'name' => 'Полукопченная Армавирская ГОСТ '.$i,
                'unit' => 'кг',
                'sale' => null,
                'news' => false,
                'price' => rand(10, 5000),
                'img' => 'Polukopchyonnaya_Armavarskaya_GOST.png',
                'description' => 'product description '.$i,
                'shelf_life' => 'product shelf_life '. $i,
                'category_id' => rand(1, 4)
            ];
        }

        return $data;
    }
}
