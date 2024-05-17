<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carousel::create([
            'image' => 'carousel/slide-1.jpg',
            'title_top' => 'Selamat Datang di',
            'title' => 'Ramatrans Travel',
            'title_bot' => 'Travel Super Executive Lampung - Palembang - jakarta - bogor - bekasi',
        ]);
        Carousel::create([
            'image' => 'carousel/slide-2.jpg',
            'title_top' => '',
            'title' => '',
            'title_bot' => '',
        ]);
        Carousel::create([
            'image' => 'carousel/slide-3.jpg',
            'title_top' => 'Jasa Transportasi',
            'title' => 'Berkualitas Tinggi',
            'title_bot' => 'Yang berada di Provinsi Lampung',
        ]);
    }
}
