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
            'nameSite'      => 'Youtube Channel',
            'urlSite'       => 'https://www.youtube.com/channel/UCxUL0zS-XiU36bkUsr5dWbg',
            'presentSite'   => 'Kênh Youtube của KINGDOM NVHAI',
            'imgSite'       => '',
            'enable'        => 1,
        ]);
        $site->create([
            'nameSite'      => 'Facebook Fanpage',
            'urlSite'       => 'https://www.facebook.com/NVHAI-306458502862792/',
            'presentSite'   => 'Fanpage của KINGDOM NVHAI',
            'imgSite'       => '',
            'enable'        => 1,
        ]);
        $site->create([
            'nameSite'      => 'Kawaii Code',
            'urlSite'       => 'advuybhdszlcjn',
            'presentSite'   => 'Blog lập trình',
            'imgSite'       => '',
            'enable'        => 1,
        ]);
    }
}

