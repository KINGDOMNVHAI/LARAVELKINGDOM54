<?php

use App\Model\site;
use Illuminate\Database\Seeder;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site = new site();
        $site->create([
            'nameSite'      => 'Website - Mạng xã hội',
            'urlSite'       => 'website-mang-xa-hoi',
            'presentSite'   => 'Website - Mạng xã hội',
            'imgSite'       => '',
            'enable'        => 1,
        ]);
    }
}

