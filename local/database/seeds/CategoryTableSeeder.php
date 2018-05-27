<?php

use App\Model\category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new category();
        $category->create([
            'nameCat' => 'No Category',
            'urlCat'  => 'no-category',
            'enable'  => false,
        ]);

        $category->create([
            'nameCat' => 'Website - Mạng xã hội',
            'urlCat'  => 'website-mang-xa-hoi',
            'enable'  => true,
        ]);

        $category->create([
            'nameCat' => 'Game',
            'urlCat'  => 'game',
            'enable'  => true,
        ]);

        $category->create([
            'nameCat' => 'Anime - Manga',
            'urlCat'  => 'anime-manga',
            'enable'  => true,
        ]);

        $category->create([
            'nameCat' => 'Thủ thuật IT',
            'urlCat'  => 'thu-thuat-it',
            'enable'  => true,
        ]);
    }
}
