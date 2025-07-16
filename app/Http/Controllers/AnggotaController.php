<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::paginate(5);
        return view('Form.anggota', compact('anggota'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'KodeAnggota' => 'required|string',
            'Nama' => 'required|string|max:255',
            'TTL' => 'required',
            'Alamat' => 'required|string',
            'KodePos' => 'required|string|max:10',
            'NoTelp' => 'nullable|string|max:15',
            'Hp' => 'required|strinng|max:15',
            'TglDaftar' => 'required|date',
            'Email' => 'required|email',
        ]);

        Anggota::updateOrCreate(
            ['KodeAnggota' => $request->KodeAnggota],  // kondisi pencarian
            [ // data yang akan dibuat / diperbarui
                'Nama'      => $request->Nama,
                'TTL'       => $request->TTL,
                'Alamat'    => $request->Alamat,
                'KodePos'   => $request->KodePos,
                'NoTelp'    => $request->NoTelp,
                'Hp'        => $request->Hp,
                'TglDaftar' => $request->TglDaftar,
                'Email'     => $request->Email,
            ]
        );
        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil disimpan/diperbarui!');
    }

    public function destroy($KodeAnggota)
    {
        $anggota = Anggota::where('KodeAnggota', $KodeAnggota)->first();
        if ($anggota) {
            $anggota->delete();
            return response()->json(['message' => 'Data berhasil dihapus']);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    }

}
