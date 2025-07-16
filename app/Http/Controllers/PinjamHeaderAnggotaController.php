<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Petugas;
use App\Models\Pinjam_Detail_Anggota;
use App\Models\Pinjam_Header_Anggota;
use Illuminate\Http\Request;

class PinjamHeaderAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjamHeaderAnggota = Pinjam_Header_Anggota::with(['anggota', 'petugas'])->paginate(5);
        
        $nextNoPinjam = Pinjam_Header_Anggota::generateNoPinjam();
        $anggota = Anggota::select('KodeAnggota', 'Nama')->get();
        $buku = Buku::select('KodeBuku', 'Judul', 'Pengarang', 'Penerbit')->get();

        return view("Form.peminjaman", compact('pinjamHeaderAnggota', 'anggota', 'nextNoPinjam', 'buku'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Simpan pinjam_header_anggota
        Pinjam_Header_Anggota::create($request->only([
            'NoPinjam', 'TglPinjam', 'TglKembali', 'KodeAnggota', 'KodePetugas'
        ]));

        // Simpan detail bukunya
        foreach ($request->buku as $item) {
            Pinjam_Detail_Anggota::create([
                'NoPinjam' => $request->NoPinjam,
                'KodeBuku' => $item['KodeBuku'],
                'Judul' => $item['Judul'], // ✅ benar, karena ini per detail baris
                'Penerbit' => $item['Penerbit'],
                'Jumlah' => $item['Jumlah'],
            ]);
        }


        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function destroy($id)
    {
        $pinjam = Pinjam_Header_Anggota::where('NoPinjam', $id)->firstOrFail();
        $pinjam->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function show(Pinjam_Header_Anggota $pinjam_Header_Anggota)
    {
        //
    }

    public function edit(Pinjam_Header_Anggota $pinjam_Header_Anggota)
    {
        //
    }

    public function update(Request $request, Pinjam_Header_Anggota $pinjam_Header_Anggota)
    {
        //
    }

}
