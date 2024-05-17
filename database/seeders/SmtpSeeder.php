<?php

namespace Database\Seeders;

use App\Models\Smtp;
use Illuminate\Database\Seeder;

class SmtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Smtp::create([
            "driver"    => 'smtp',
            "host"  => "smtp.mailtrap.io",
            "port" => "465",
            "encryption"    => "tls",
            "username"  => "20e1684b35697d",
            "password" => "0da90d94954378",
            "sender_email"   => "info@ramatrans.com",
            "sender_name"  => config('app.name'),
        ]);
    }
}
