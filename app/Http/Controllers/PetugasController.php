<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Tampilkan semua data petugas.
     */
    public function index()
    {
        $petugas = Petugas::all();
        return view('Form.petugas', compact('petugas'));
    }

    /**
     * Simpan data petugas (baru atau update).
     */
    public function store(Request $request)
    {
        // Validasi tanpa mewajibkan Password
        $validated = $request->validate([
            'KodePetugas' => 'required|string|max:10',
            'Nama'        => 'required|string|max:255',
            'Jabatan'     => 'required|string|max:50',
            'HakAkses'    => 'required|in:Admin,Petugas',
            'password'    => 'nullable|string|min:8', // password boleh kosong saat update
        ]);

        // Cari petugas berdasarkan kode
        $petugas = Petugas::where('KodePetugas', $request->KodePetugas)->first();

        // Jika ada, update. Jika tidak, buat baru.
        if ($petugas) {
            // Update field
            $petugas->Nama     = $request->Nama;
            $petugas->Jabatan  = $request->Jabatan;
            $petugas->HakAkses = $request->HakAkses;

            // Update password jika diisi
            if ($request->filled('password')) {
                $petugas->password = Hash::make($request->password);
            }

            $petugas->save();
        } else {
            // Buat baru dengan password wajib diisi
            $request->validate([
                'password' => 'required|string|min:8'
            ]);

            Petugas::create([
                'KodePetugas' => $request->KodePetugas,
                'Nama'        => $request->Nama,
                'Jabatan'     => $request->Jabatan,
                'HakAkses'    => $request->HakAkses,
                'password'    => Hash::make($request->password),
            ]);
        }

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil disimpan atau diperbarui.');
    }


    /**
     * Hapus data petugas.
     */
    public function destroy(Petugas $petugas)
    {
        $petugas->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
