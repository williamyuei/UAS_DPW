<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class PetugasTestSeeder extends Seeder
{
    public function run(): void
    {
        Petugas::create([
            'KodePetugas' => 'PTG-101',
            'Nama' => 'Petugas Test',
            'Jabatan' => 'Staf Admin',
            'HakAkses' => 'Admin',
            'password' => Hash::make('password123'), // password: password123
        ]);
    }
}
