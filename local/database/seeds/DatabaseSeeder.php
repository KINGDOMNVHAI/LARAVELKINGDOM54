<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CategoryTableSeeder::class);
        //$this->call(CategoryPostTableSeeder::class);  Dành cho 1 bài viết nhiều chuyên mục
        $this->call(DetailpostTableSeeder::class);
        $this->call(DownloadTableSeeder::class);
        $this->call(SiteTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        Model::reguard();
    }
}
