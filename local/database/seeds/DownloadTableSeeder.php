<?php

use App\Model\download;
use Illuminate\Database\Seeder;

class DownloadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new download();
        $user->create([
            'nameDown'  => 'Infinite Stratos',
            'linkDown' => 'xfvxfcv xcsertfg',
            'imgDown'  => 'Infinite-Stratos.jpg',
            'enable'  => 1,
            'idDetailPost'  => 6,
        ]);

        $user->create([
            'nameDown'  => 'Madan ou no Vanadish',
            'linkDown' => 'adfvsgewrtgewt534',
            'imgDown'  => 'Madan.jpg',
            'enable'  => 0,
            'idDetailPost'  => 4,
        ]);
    }
}
