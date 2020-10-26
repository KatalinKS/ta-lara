<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductLocaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_locales')->insert([
            'name' => 'Тестовое имя',
            'product_id' => 1,
            'description' => 'Тестовое описание',
            'locale' => 'ru',
        ]);
        DB::table('product_locales')->insert([
            'name' => 'test name',
            'product_id' => 1,
            'description' => 'test description',
            'locale' => 'en',
        ]);
    }
}
