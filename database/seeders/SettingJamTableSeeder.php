<?php

namespace Database\Seeders;

use App\Models\SettingJam;
use Database\Factories\SettingJamFactory;
use Illuminate\Database\Seeder;

class SettingJamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
