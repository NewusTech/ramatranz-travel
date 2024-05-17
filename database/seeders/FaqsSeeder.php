<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'question'  => "Apa itu Rama trans travel ?",
            'answer'    => "Rama trans travel merupakan perusahaan resmi Jasa angkutan Travel yang melayani Perjalanan Jakarta lampung (PP) door to door service Jakarta ke Lampung, Bandar Jaya, Metro, Pringsewu, Kotabumi, Baturaja, Palembang aman dan terpercaya. ",
        ]);
        // Faq::create([
        //     'question'  => "Protokol apa saja yang diterapkan di rama trans ?",
        //     'answer'    => "",
        // ]);
        Faq::create([
            'question'  => "Bagaimana cara pemesanan di rama trans ?",
            'answer'    => "Anda dapat menghubungi kami melalui whatsapp di 0811-7298-168 atau di 0811-7208-168 dan agen kami akan segera meluncur.",
        ]);

        Faq::create([
            'question'  => "Kenapa saya harus memilih Ramatrans?",
            'answer'    => "Ramatrans menyediakan jasa angkutan dengan armada terbaru yang memiliki kualitas prima karena selalu dilakukan pengecekan berkala untuk menjamin kenyamanan dan keselamatan Anda. selain itu terdapat beberapa fasilitas seperti voucher makan, snack dan door to door service alias antar jemput penumpang, memastikan Anda selamat sampai depan rumah Anda.",
        ]);
        Faq::create([
            'question'  => "Selain penumpang, apakah ramatrans juga bisa mengirimkan paket?",
            'answer'    => "Ya, bahkan kami menjamin paket Anda akan kami antarkan ke alamat tujuan dengan cepat (semalam sampai)",
        ]);
        Faq::create([
            'question'  => "Rute mana saja yang dicover oleh Ramatrans?",
            'answer'    => "Kami melayani rute antar provinsi. Palembang, Lampung (Bandar Lampung, Metro, Tulang Bawang Barat, Daya Murni, Bandar Jaya, Padang Cermin), Jakarta, Depok, Bogor dan Bekasi",
        ]);

        Faq::create([
            'question'  => "Apakah Ramatrans juga melayani rental?",
            'answer'    => "Anda bisa menggunakan jasa RentalCarter kami dengan harga murah, bisa digunakan dalam kota hingga antar provinsi",
        ]);
    }
}
