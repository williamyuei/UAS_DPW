<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::paginate(5);
        return view('Form.buku', compact('buku'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'KodeBuku'      => 'required|string',
            'NoUDC'         => 'required|string',
            'NoReg'         => 'required|string',
            'Judul'         => 'required|string',
            'Penerbit'      => 'required|string',
            'Pengarang'     => 'required|string',
            'TahunTerbit'   => 'required|digits:4|integer',
            'KotaTerbit'    => 'required|string',
            'Bahasa'        => 'required|string',
            'Edisi'         => 'nullable|string',
            'Deskripsi'     => 'nullable|string',
            'ISBN'          => 'required|string',
            'JumEksemplar'  => 'required|integer',
            'SubyekUtama'   => 'required|string',
            'SubyekTambahan'=> 'nullable|string',
        ]);

        Buku::updateOrCreate(
            ['KodeBuku' => $request->KodeBuku],
            $validated
        );

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil disimpan/diperbarui.');
    }

    public function destroy($KodeBuku)
    {
        $buku = Buku::where('KodeBuku', $KodeBuku)->first();

        if (!$buku) {
            return response()->json(['error' => 'Data buku tidak ditemukan.'], 404);
        }

        $buku->delete();

        return response()->json(['success' => 'Data buku berhasil dihapus.']);
    }

}
