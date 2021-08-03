<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Варено-копченые колбасы',
            'slug' => 'varenokopchenye_kolbasy',
//            'sale' => null,
        ]);
        DB::table('categories')->insert([
            'name' => 'Вареные колбасы',
            'slug' => 'varenye_kolbasy',
//            'sale' => 10,
        ]);
        DB::table('categories')->insert([
            'name' => 'Ветчина',
            'slug' => 'vetchina',
//            'sale' => 25,
        ]);
        DB::table('categories')->insert([
            'name' => 'Деликатесы из мяса варено-копченые',
            'slug' => 'delikatesy_iz_mjasa_varenokopchenye',
//            'sale' => null,
        ]);
        DB::table('categories')->insert([
            'name' => 'Полукопченые колбасы',
            'slug' => 'polukopchenye_kolbasy',
//            'sale' => null,
        ]);
        DB::table('categories')->insert([
            'name' => 'Полуфабрикаты',
            'slug' => 'polufabrikaty',
//            'sale' => null,
        ]);
        DB::table('categories')->insert([
            'name' => 'Продукт из мяса птицы',
            'slug' => 'produkt_iz_mjasa_pticy',
//            'sale' => null,
        ]);
        DB::table('categories')->insert([
            'name' => 'Сардельки, сосиски',
            'slug' => 'sardelki_sosiski',
//            'sale' => null,
        ]);
    }
}
