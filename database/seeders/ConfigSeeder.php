<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create(['key' => 'logo', 'value' =>'config/logo.png']);
        Config::create(['key' => 'name', 'value' =>'Ramatrans Travel Lampung']);
        Config::create(['key' => 'company', 'value' =>'Ramatrans']);
        Config::create(['key' => 'address', 'value' =>'']);
        Config::create(['key' => 'phone','value' =>'']);
        Config::create(['key' => 'email']);
        Config::create(['key' => 'website']);
        Config::create(['key' => 'welcome', 'value' =>null]);
        Config::create(['key' => 'tentang','value' =>'Ramatrans Travel adalah perusahaan resmi Jasa angkutan Travel yang melayani Perjalanan Jakarta lampung (PP) door to door service Jakarta ke Lampung, Bandar Jaya, Metro, Pringsewu, Kotabumi, Baturaja, Palembang aman dan terpercaya.']);
    }
}
