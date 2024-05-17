<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::create([
            'title' => 'Ramatrans gallery 1',
            'image' => 'gallery/285x285-1@2x.jpg',
        ]);
        Gallery::create([
            'title' => 'Ramatrans gallery 2',
            'image' => 'gallery/285x285-2@2x.jpg',
        ]);
        Gallery::create([
            'title' => 'Ramatrans gallery 3',
            'image' => 'gallery/285x285-3@2x.jpg',
        ]);
        Gallery::create([
            'title' => 'Ramatrans gallery 4',
            'image' => 'gallery/285x285-4@2x.jpg',
        ]);
        Gallery::create([
            'title' => 'Ramatrans gallery 5',
            'image' => 'gallery/285x285-5@2x.jpg',
        ]);
        Gallery::create([
            'title' => 'Ramatrans gallery 6',
            'image' => 'gallery/285x285-6@2x.jpg',
        ]);
        Gallery::create([
            'title' => 'Ramatrans gallery 7',
            'image' => 'gallery/285x285-7@2x.jpg',
        ]);
        Gallery::create([
            'title' => 'Ramatrans gallery 8',
            'image' => 'gallery/285x285-8@2x.jpg',
        ]);
        Gallery::create([
            'title' => 'Ramatrans gallery 9',
            'image' => 'gallery/580x285-1@2x.jpg',
        ]);
        Gallery::create([
            'title' => 'Ramatrans gallery 10',
            'image' => 'gallery/580x285-2@2x.jpg',
        ]);
    }
}
