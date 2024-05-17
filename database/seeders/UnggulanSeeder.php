<?php

namespace Database\Seeders;

use App\Models\Unggulan;
use Illuminate\Database\Seeder;

class UnggulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unggulan::create([
            'icon'   => "flaticon-suntour-world",
            'title'  => "Door to Door Service",
            'desc'   => "Kami melayani antar jemput penumpang langsung dari dan ke pintu rumah Anda. memastikan perjalanan Anda selamat sampai tujuan.",
        ]);
        Unggulan::create([
            'icon'   => "flaticon-suntour-car",
            'title'  => "Armada Terbaik",
            'desc'   => "Kami memiliki Armada terbaik sebagai angkutan penumpang, dengan perawatan berkala yang menjamin keselamatan Anda.",
        ]);
        Unggulan::create([
            'icon'   => "flaticon-favorite",
            'title'  => "Fasilitas Nyaman",
            'desc'   => "Capek dijalan? tenang, fasilitas Ramatrans Travel selalu bikin nyaman, plus ada snack dan voucher makan juga lho.",
        ]);
    }
}
