<?php

use App\Model\categorypost;
use Illuminate\Database\Seeder;

class CategoryPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new categorypost();

        for ($i=1; $i <= 30; $i++)
        {
            $category->create([
                'idDetailPost'  => $i,
                'idCat'         => ANIME_POST,
            ]);
        }

        for ($i=31; $i <= 61; $i++)
        {
            $category->create([
                'idDetailPost'  => $i,
                'idCat'         => GAME_POST,
            ]);
        }

    }
}
