<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AnggotaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'KodeAnggota' => 'AG-' . $this->faker->unique()->numberBetween(1000, 9999),
            'Nama' => $this->faker->name,
            'TTL' => $this->faker->date('Y-m-d') . ', ' . $this->faker->city,
            'Alamat' => $this->faker->address,
            'KodePos' => $this->faker->postcode,
            'NoTelp' => $this->faker->phoneNumber,
            'Hp' => $this->faker->numerify('08##########'),
            'TglDaftar' => $this->faker->date(),
            'Email' => $this->faker->unique()->safeEmail,
        ];
    }
}
