<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    public function definition(): array
    {
        return [
            'KodeBuku' => 'BK-' . $this->faker->unique()->numberBetween(1000, 9999),
            'NoUDC' => $this->faker->bothify('###.##'),
            'NoReg' => 'REG-' . $this->faker->unique()->numberBetween(1000, 9999),
            'Judul' => $this->faker->sentence(3),
            'Penerbit' => $this->faker->company,
            'Pengarang' => $this->faker->name,
            'TahunTerbit' => $this->faker->year,
            'KotaTerbit' => $this->faker->city,
            'Bahasa' => $this->faker->randomElement(['Indonesia', 'Inggris', 'Jerman', 'Jepang']),
            'Edisi' => 'Edisi ' . $this->faker->numberBetween(1, 5),
            'Deskripsi' => $this->faker->paragraph,
            'ISBN' => $this->faker->isbn13,
            'JumEksemplar' => $this->faker->numberBetween(1, 10),
            'SubyekUtama' => $this->faker->word,
            'SubyekTambahan' => $this->faker->words(3, true),
        ];
    }
}
