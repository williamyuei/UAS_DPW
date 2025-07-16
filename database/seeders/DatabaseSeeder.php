<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Petugas;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\b;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Petugas::create([
            'KodePetugas' => 'PTG-102',
            'Nama' => 'Petugas Test',
            'Jabatan' => 'Staf Admin',
            'HakAkses' => 'Admin',
            'password' => Hash::make('password123'), // password: password123
        ]);

        Buku::factory()->count(20)->create();
        Anggota::factory()->count(20)->create();
        Petugas::factory()->count(3)->create();

        $this->call([
            PetugasSeeder::class,
        ]);
    }
}
