<?php

namespace Database\Seeders;

use App\Models\LinkYoutube;
use Illuminate\Database\Seeder;

class YoutubeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LinkYoutube::create([
            'link_youtube'   => "https://www.youtube.com/embed/ehi8DMG4Ci0",
        ]);
    }
}
