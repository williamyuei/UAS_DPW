<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Petugas>
 */
class PetugasFactory extends Factory
{
    public function definition(): array
    {
        return [
            'KodePetugas' => 'PTG-' . $this->faker->unique()->numerify('###'),
            'Nama' => $this->faker->name(),
            'Jabatan' => $this->faker->randomElement(['Kepala Perpustakaan', 'Staf Admin', 'Pustakawan']),
            'HakAkses' => $this->faker->randomElement(['Admin', 'Petugas']),
            'password' => bcrypt('password')  // default password
        ];
    }
}
