<?php

namespace Database\Seeders;

// use App\Models\Role as ModelsRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $superadmin = ModelsRole::create(['name' => 'Superadmin', 'guard_name' => 'web']);

        $admincms = ModelsRole::create(['name' => 'Admin CMS', 'guard_name' => 'web']);


        $user = \App\Models\User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
            'profile_photo_path' => 'profile-photos/default.png'
        ]);

        $user->assignRole($superadmin);
    }
}
