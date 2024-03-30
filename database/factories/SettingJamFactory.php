<?php

namespace Database\Factories;

use App\Models\SettingJam;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingJamFactory extends Factory
{
    protected $model = SettingJam::class;

    public function definition()
    {
        return [
            'namasetting' => $this->faker->randomElement(['masuk', 'pulang']),
            'jammasukawal' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'jammasukakhir' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'jamkeluarawal' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'jamkeluarakhir' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
