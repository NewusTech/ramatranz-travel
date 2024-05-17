<?php

namespace Database\Seeders;

use App\Models\JenisLayanan;
use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $travel =  JenisLayanan::create([
            'title' => 'Travel',
            'slug' => 'travel',
        ]);

        $paket  =  JenisLayanan::create([
            'title' => 'Pengiriman Paket',
            'slug' => 'pengiriman-paket',
        ]);

        // $cargo =    JenisLayanan::create([
        //                 'title' => 'Jasa Cargo',
        //                 'slug' => 'jasa-cargo'
        //             ]);

        $carter =   JenisLayanan::create([
            'title' => 'Carter',
            'slug' => 'carter',
        ]);

        //Travel
        {
            /**
             * Jakarta
             */ {
                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Jakarta - Bandar Lampung',
                    'slug'                  => 'jakarta-bandar-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 300000,
                    'asal'                  => "Jakarta",
                    'tujuan'                => "Bandar Lampung",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bandar Lampung - Pagar Alam',
                    'slug'                  => 'bandar-lampung-pagar-alam',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 250000,
                    'asal'                  => "Bandar Lampung",
                    'tujuan'                => "Pagar Alam",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 08:15 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Sore : 15:00 - 15:15 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 20:00 - 20:15 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bandar Lampung - Lubuk Linggau',
                    'slug'                  => 'bandar-lampung-lubuk-linggau',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 250000,
                    'asal'                  => "Bandar Lampung",
                    'tujuan'                => "Lubuk Linggau",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 08:15 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Sore : 15:00 - 15:15 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 20:00 - 20:15 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bandar Lampung - Muara Inim',
                    'slug'                  => 'bandar-lampung-muara-inim',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 200000,
                    'asal'                  => "Bandar Lampung",
                    'tujuan'                => "Muara Inim",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 08:15 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Sore : 15:00 - 15:15 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 20:00 - 20:15 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bandar Lampung - Tanjung Inim',
                    'slug'                  => 'bandar-lampung-tanjung-inim',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 200000,
                    'asal'                  => "Bandar Lampung",
                    'tujuan'                => "Tanjung Inim",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 08:15 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Sore : 15:00 - 15:15 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 20:00 - 20:15 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bandar Lampung - Batu Raja',
                    'slug'                  => 'bandar-lampung-tanjung-inim',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 150000,
                    'asal'                  => "Bandar Lampung",
                    'tujuan'                => "Batu Raja",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 08:15 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Sore : 15:00 - 15:15 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 20:00 - 20:15 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Jakarta - Metro',
                    'slug'                  => 'jakarta-metro-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 300000,
                    'asal'                  => "Jakarta",
                    'tujuan'                => "Metro",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Jakarta - Daya Murni',
                    'slug'                  => 'jakarta-daya-murni-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 330000,
                    'asal'                  => "Jakarta",
                    'tujuan'                => "Daya Murni",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Jakarta - Bandar Jaya',
                    'slug'                  => 'jakarta-bandar-jaya-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 300000,
                    'asal'                  => "Jakarta",
                    'tujuan'                => "Bandar Jaya",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Jakarta - Padang Cermin',
                    'slug'                  => 'jakarta-padang-cermin-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 300000,
                    'asal'                  => "Jakarta",
                    'tujuan'                => "Padang Cermin",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);
            }

            /**
             * Bekasi
             */ {

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bekasi - Bandar lampung',
                    'slug'                  => 'bekasi-bandar-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 350000,
                    'asal'                  => "Bekasi",
                    'tujuan'                => "Bandar lampung",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bekasi - Daya Murni lampung',
                    'slug'                  => 'bekasi-daya-murni-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 350000,
                    'asal'                  => "Bekasi",
                    'tujuan'                => "Daya Murni",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bekasi - Metro lampung',
                    'slug'                  => 'bekasi-metro-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 350000,
                    'asal'                  => "Bekasi",
                    'tujuan'                => "Metro",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bekasi - Bandar Jaya lampung',
                    'slug'                  => 'bekasi-bandar-jaya-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 350000,
                    'asal'                  => "Bekasi",
                    'tujuan'                => "Bandar Jaya",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bekasi - Padang Cermin lampung',
                    'slug'                  => 'bekasi-padang-cermin-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 350000,
                    'asal'                  => "Bekasi",
                    'tujuan'                => "Padang Cermin",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);
            }

            /**
             * Bogor
             */ {
                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bogor - Bandar lampung',
                    'slug'                  => 'bogor-bandar-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 450000,
                    'asal'                  => "Bogor",
                    'tujuan'                => "Bandar lampung",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bogor - Daya Murni lampung',
                    'slug'                  => 'bogor-daya-murni-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 450000,
                    'asal'                  => "Bogor",
                    'tujuan'                => "Daya Murni",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bogor - Metro lampung',
                    'slug'                  => 'bogor-metro-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 450000,
                    'asal'                  => "Bogor",
                    'tujuan'                => "Metro",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bogor - Bandar Jaya lampung',
                    'slug'                  => 'bogor-bandar-jaya-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 450000,
                    'asal'                  => "Bogor",
                    'tujuan'                => "Bandar Jaya",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Bogor - Padang Cermin lampung',
                    'slug'                  => 'bogor-padang-cermin-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 450000,
                    'asal'                  => "Bogor",
                    'tujuan'                => "Padang Cermin",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);
            }

            /**
             * Palembang
             */ {

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Palembang - Bandar lampung',
                    'slug'                  => 'palembang-bandar-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 200000,
                    'asal'                  => "Palembang",
                    'tujuan'                => "Bandar lampung",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Palembang - Jakarta',
                    'slug'                  => 'palembang-jakarta',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 500000,
                    'asal'                  => "Palembang",
                    'tujuan'                => "Jakarta",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);

                Layanan::create([
                    'user_id'   => 1,
                    'jenis_layanan_id'      => $travel->id,
                    'title'                 => 'Palembang - Metro lampung',
                    'slug'                  => 'palembang-metro-lampung',
                    'intro'                 => "Nikmati perjalanan Anda dengan nyaman bersama armada terbaru kami da berbagai fasilitas didalamnya",
                    'content'               => "<p>Ramatrans menghadirkan armada terbaru yakni Hiace yang lebih luas. nikmati perjalanan Anda dengan berbagai fasilitas didalamnya mulai dari AC yang sejuk, Voucher makan, Snack, dan lain sebagainya.</p>",
                    'image'                 => "layanan/travel-ramatrans.jpg",
                    'price'                 => 200000,
                    'asal'                  => "Palembang",
                    'tujuan'                => "Metro",
                    'wa'                    => "08117298168",
                    'jadwal_berangkat'      => '<ul>
                                                <li><span class="name" data-wfid="7705c0cd873a:65437ae74de6"><span class="innerContentContainer">Pagi : 08:00 - 10:00 WIB</span></span></li>
                                                <li><span class="name" data-wfid="7705c0cd873a:964d3b7b49b5"><span class="innerContentContainer">Malam : 19:00 - 21:00 WIB</span></span></li>
                                                </ul>',
                ]);
            }
        }

        // Carter
        {
            Layanan::create([
                'user_id'   => 1,
                'jenis_layanan_id'      => $carter->id,
                'title'                 => 'Layanan Carter',
                'slug'                  => 'carter',
                'intro'                 => "Ingin lebih hemat bepergian, gunakan layanan carter untuk armada kami",
                'content'               => '<p>Ramatrans menyediakan layanan carter bagi Anda dan keluarga/sahabat yang ingin melakukan perjalanan privat untuk berbagai keperluan.</p>
                                                    <ul>
                                                    <li><strong><span class="name" data-wfid="7705c0cd873a:56f1999b60e3"><span class="innerContentContainer">Dalam Kota</span></span></strong>
                                                    <ul>
                                                    <li><span class="name"><span class="innerContentContainer">All in : Rp.1.500.000 per hari</span></span></li>
                                                    <li><span class="name"><span class="innerContentContainer">Mobil + Driver : Rp.1.200.000 per hari</span></span></li>
                                                    </ul>
                                                    </li>
                                                    <li><strong><span class="name" data-wfid="7705c0cd873a:d917c79a3d6c"><span class="innerContentContainer">Luar kota</span></span></strong>
                                                    <ul>
                                                    <li><span class="name"><span class="innerContentContainer">All in : Rp. 2.000.000 per hari (min. 3 hari) </span></span></li>
                                                    <li><span class="name"><span class="innerContentContainer">Mobil + Driver : Rp. 1.300.000 per hari (min. 3 hari)</span></span></li>
                                                    </ul>
                                                    </li>
                                                    <li><strong><span class="name" data-wfid="7705c0cd873a:d4e14462a423"><span class="innerContentContainer">Lintas Provinsi</span></span></strong>
                                                    <ul>
                                                    <li><span class="name"><span class="innerContentContainer">All in : Rp. 2.000.000 per hari (min. 4 hari)</span></span></li>
                                                    <li><span class="name"><span class="innerContentContainer">Mobil + Driver : Rp. 1.350.000 per hari (min. 4 hari)</span></span></li>
                                                    </ul>
                                                    </li>
                                                    <li><strong><span class="name" data-wfid="7705c0cd873a:bdc62e548ffe"><span class="innerContentContainer">Sekali jalan</span></span></strong>
                                                    <ul>
                                                    <li><span class="name"><span class="innerContentContainer">All in : Rp. 2.000.000 (Drop Palembang)</span></span></li>
                                                    <li><span class="name"><span class="innerContentContainer">All in : Rp. 3.000.000 (Drop Jakarta)</span></span></li>
                                                    </ul>
                                                    </li>
                                                    </ul>',
                'image'                 => "layanan/travel-ramatrans.jpg",
                'wa'                    => "08117298168",
            ]);
        }

        // Paket
        {
            Layanan::create([
                'user_id'   => 1,
                'jenis_layanan_id'      => $paket->id,
                'title'                 => 'Layanan Pengiriman Paket',
                'slug'                  => 'pengiriman-paket',
                'intro'                 => "Kirim paket cepat dan hemat, gunakan Ramatrans Paket",
                'content'               => '<p>Ramatrans melayani pengiriman paket ke berbagai wilayah yakni<strong> <span class="innerContentContainer">Jakarta - B.Lampung - Daya Murni - Bandar Jaya - Palembang - Metro - Padang cermin </span></strong><span class="innerContentContainer">dengan biaya yang lebih murah dan jaminan sampai dalam semalam saja.</span></p>',
                'image'                 => "layanan/travel-ramatrans.jpg",
                'wa'                    => "08117298168",
            ]);
        }
    }
}
