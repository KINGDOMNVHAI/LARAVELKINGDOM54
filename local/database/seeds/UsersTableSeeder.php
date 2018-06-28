<?php

use App\Model\user;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TYPE_MEMBER  TYPE_EDITOR  TYPE_ADMIN

        $user = new user();
        $user->create([
            'lastname'  => 'Nguyễn Việt',
            'firstname' => 'Hải',
            'username'  => 'NVHAI',
            'password'  => bcrypt('ThienNu0107'),
            'email'     => 'kingdomnvhai@gmail.com',
            'type'      => TYPE_ADMIN,

            'city'      => 'TPHCM',
            'address'   => 'Q1',
            'company'   => 'KINGDOM NVHAI',
            'aboutme'   => 'Hentai is life',
            'signature' => 'NVHAI',
            'avatar'    => 'avatar_tohka_2.jpg',
            'banner'    => 'banner_Kurumi.jpg',
        ]);

        $user->create([
            'lastname'  => 'Overwatch',
            'firstname' => 'DVA',
            'username'  => 'dva123',
            'password'  => bcrypt('12345678'),
            'email'     => 'nvhai2306@gmail.com',
            'type'      => TYPE_EDITOR,

            'city'      => 'TPHCM',
            'avatar'    => 'avatar_dva_2.jpg',
            'banner'    => 'banner_dva_2.jpg',
        ]);

        $user->create([
            'lastname'  => 'LMHT',
            'firstname' => 'Ahri',
            'username'  => 'Ahri061993',
            'password'  => bcrypt('12345678'),
            'email'     => 'nvhai061993@gmail.com',
            'type'      => TYPE_MEMBER,

            'city'      => 'TPHCM',
            'avatar'    => 'avatar_Ahri.jpg',
            'banner'    => 'banner_Ahri.jpg',
        ]);
    }
}
