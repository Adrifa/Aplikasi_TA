<?php

namespace Database\Seeders;

use App\Models\SettingJam;
use App\Models\User;
use Database\Factories\SettingJamFactory;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // Periksa apakah tabel sudah memiliki data
        if (User::count() === 0) {
            // Jika tidak ada data, tambahkan data default menggunakan create
            User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => base64_encode(random_bytes(32)),
                'status' => 'admin',
            ]);

        }

        // Periksa apakah tabel sudah memiliki data
        if (SettingJam::count() === 0) {
            // Jika tidak ada data, tambahkan data default menggunakan factory
            SettingJamFactory::new()->create([
                'namasetting' => 'settingwaktu',
                'jammasukawal' => '01:00:00',
                'jammasukakhir' => '07:00:00',
                'jamkeluarawal' => '17:00:00',
                'jamkeluarakhir' => '23:59:00',
            ]);
        }

      //   \App\Models\User::factory(10)->create();


    }
}
