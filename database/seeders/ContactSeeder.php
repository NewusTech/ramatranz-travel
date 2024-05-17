<?php

namespace Database\Seeders;

use App\Models\Kontak;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kontak::create([
            'alamat'    => "Jl. Salim Batubara No.118, Kupang Teba, Kec. Tlk. Betung Utara, Kota Bandar Lampung, Lampung 35212",
            'lat'       => "-5.4423350882876065",
            'lng'       => "105.27249723041696",
            'email'     => "ramatrans@gmail.com",
            'phone_tr_1'   => "08117298168",
            'phone_tr_2'   => "08117208168",
            'phone_cr_1'   => "08117208168",
            'phone_cr_2'   => "08117208168",
            'wa_1'   => "08117298168",
            'wa_2'   => "08117208168",
        ]);
    }
}
