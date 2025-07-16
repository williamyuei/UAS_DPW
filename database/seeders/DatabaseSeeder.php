<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Petugas;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Symfony\Component\String\b;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Petugas::factory()->create([
            'KodePetugas' => 'Akbar',
            'Nama' => 'Akbar',
            'Jabatan' => 'COE',
            'HakAkses' => 'Admin',
            'Password' => bcrypt('Akbar'),
        ]);

        //Buku::factory()->count(20)->create();
        //Anggota::factory()->count(20)->create();
        //Petugas::factory()->count(3)->create();
    }
}
