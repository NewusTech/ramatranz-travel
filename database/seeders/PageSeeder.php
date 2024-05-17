<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'author_id' => 1,
            'title' => 'Apa itu Rama Trans Travel ?',
            'slug' => 'tentang',
            'content' => '<p><strong>RAMATRANS TRAVEL</strong> merupakan usaha jasa transportasi travel terbaik di provinsi Lampung. <span>Sejak tahun 2012, RAMA travel telah melayani rute Lampung, Palembang, Jakarta, Bogor dan Bekasi. Saat ini, RAMA travel memiliki sejumlah kantor cabang di berbagai kota yang kami lalui, dengan kantor pusat utama berada di kota Bandar Lampung, provinsi Lampung berlokasi di Jl. Salim Batubara No.118 Kupang Teba Kec. Tlk. Betung Utara Kota Bandar Lampung, Lampung 35212 menggunakan armada <strong>HI ACE</strong> terbaru dengan fasilitas full AC.</span></p>',
            'meta_desc' => 'Ramatrans travel merupakan usaha jasa travel terbaik di provinsi Lampung',
            'seo_title' => 'Tentang Kami - Rama Trans Travel Lampung',
            'short_description' => 'RAMATRANS TRAVEL berlokasi di Jl. Salim Batubara No.118 Kupang Teba Kec. Tlk. Betung Utara Kota Bandar Lampung, Lampung 35212.',
            'posted_ad' => now(),
            'media' => "pages/aboutus.png",
        ]);
    }
}
