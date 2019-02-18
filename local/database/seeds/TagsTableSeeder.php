<?php

use App\Model\tags;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = new tags();
        $tags->create([
            'nameTag'   => 'Công nghiệp anime',
        ]);

        $tags->create([
            'nameTag'   => 'Văn hóa Nhật Bản',
        ]);

        $tags->create([
            'nameTag'   => 'Virtual Youtuber',
        ]);

        $tags->create([
            'nameTag'   => 'Kizuna AI',
        ]);

        $tags->create([
            'nameTag'   => 'PewDiePie',
        ]);

        $tags->create([
            'nameTag'   => 'Review anime',
        ]);
    }
}
