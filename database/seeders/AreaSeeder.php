<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\ParentArea;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabar = ParentArea::create([
            'nama_provinsi' => 'Jawa Barat',
            'slug'          => 'jawa-barat',
            'image'         => 'area/jawa-barat.jpg'
        ]);

        $jakarta = ParentArea::create([
            'nama_provinsi' => 'DKI Jakarta',
            'slug'          => 'jakarta',
            'image'         => 'area/jakarta.jpg'
        ]);
        $lampung = ParentArea::create([
            'nama_provinsi' => 'Lampung',
            'slug'          => 'lampung',
            'image'         => 'area/lampung.jpg'
        ]);
        $sumsel = ParentArea::create([
            'nama_provinsi' => 'Sumatera Selatan',
            'slug'          => 'sumsel',
            'image'         => 'area/sumsel.jpg'
        ]);

        // lampung
        {
            // Bandar Lampung;
            Area::create([
                'parent_areas_id'   => $lampung->id,
                'kota_kab'  => "Bandar Lampung",
                'alamat'    => "Jl. Salim Batubara No.118, Kupang Teba, Kec. Tlk. Betung Utara, Kota Bandar Lampung, Lampung 35212",
                'lat'       => "-5.4423350882876065",
                'lng'       => "105.27249723041696",
                'isHQ'      => 1,
                'nama_phone' => "Loket Ramatrans Bandar lampung",
                'phone_1'   => "08117298168",
                'phone_2'   => "08117208168"
            ]);

            Area::create([
                'parent_areas_id'   => $lampung->id,
                'kota_kab'  => "Bandar Lampung 2",
                'alamat'    => "Jl. Ikan Tembakang No.2, Sukaraja Kec. Telukbetung Selatan Kota Bandar Lampung, Lampung 35226 ",
                'lat'       => "-5.442642659766725",
                'lng'       => "105.28672294728528",
                'nama_phone' => "Loket Ramatrans Bandar lampung",
                'phone_1'   => "08117298168",
                'phone_2'   => "08117208168"
            ]);

            Area::create([
                'parent_areas_id'   => $lampung->id,
                'kota_kab'  => "Metro",
                'alamat'    => "Jl. Raden Intan No.41, Imopuro, Kota Metro, Lampung 34124",
                'lat'       => "-5.111154682465888",
                'lng'       => "105.30754872489246",
                'nama_phone' => "Loket Ramatrans Metro",
                'phone_1'   => "08117298168",
                'phone_2'   => "08117208168"
            ]);

            Area::create([
                'parent_areas_id'   => $lampung->id,
                'kota_kab'  => "Tulang Bawang Barat",
                'alamat'    => "Jl. Jenderal Sudirman no.2 Daya Asri,Tumi Jajar Kab. Tulang Bawang Barat Lampung 34691",
                'lat'       => "-4.635744690579189",
                'lng'       => "105.07558933838176",
                'nama_phone' => "Loket Ramatrans Metro",
                'phone_1'   => "08117298168",
                'phone_2'   => "08117208168"
            ]);
        }

        // Sumatera Selatan
        {
            Area::create([
                'parent_areas_id'   => $sumsel->id,
                'kota_kab'  => "Palembang",
                'alamat'    => "Jl. Mayor santoso no 3112 A Kamboja  20 Ilir D. III Kec. Ilir Tim. I Kota Palembang, Sumatera Selatan 30121",
                'lat'       => "-2.966356353242491",
                'lng'       => "104.74715257461621",
                'nama_phone' => "Loket Ramatrans Palembang",
                'phone_1'   => "08117298168",
                'phone_2'   => "08117208168"
            ]);
        }

        // Jawa Barat
        {
            Area::create([
                'parent_areas_id'   => $jabar->id,
                'kota_kab'  => "Bogor",
                'alamat'    => "Komplek ruko Mayor Oking II blok B No.8 , Jl. Raya Mayor Oking Jaya Atmaja, Cirimekar, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16917 ",
                'lat'       => "-6.472248517443411",
                'lng'       => "106.8623609709152",
                'nama_phone' => "Loket Ramatrans Bogor",
                'phone_1'   => "08117298168",
                'phone_2'   => "08117208168"
            ]);
        }

        // DKI Jakarta
        {
            Area::create([
                'parent_areas_id'   => $jakarta->id,
                'kota_kab'  => "Depok",
                'alamat'    => "Jl. Kalimulya cilodong, kota Depok ",
                'lat'       => "-6.444047791239595",
                'lng'       => " 106.82309992490168",
                'nama_phone' => "Loket Ramatrans Jakarta",
                'phone_1'   => "08117298168",
                'phone_2'   => "08117208168"
            ]);
        }
    }
}
