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
            'linkDown' => 'http://hentaihaven.org/oppai-no-ouja-48-episode-2/',
            'imgDown'  => 'Infinite-Stratos-thumbnail.jpg',
            'enable'  => 1,
            'idDetailPost'  => 6,
        ]);

        $user->create([
            'nameDown'  => 'Madan ou no Vanadish',
            'linkDown' => 'http://hentaihaven.org/honoo-no-haramase-oppai-ero-appli-gakuen-the-animation-episode-1/',
            'imgDown'  => 'Madan-No-Ou-To-Vanadis-Than-Tien-va-Chien-Co-thumbnail.jpg',
            'enable'  => 0,
            'idDetailPost'  => 4,
        ]);
    }
}
