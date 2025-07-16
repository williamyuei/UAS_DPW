<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Laporan.index');
    }


    public function anggota()
    {
        $anggota = Anggota::paginate(15);
        return view('Laporan.anggota', compact('anggota'));
    }


    public function buku()
    {
        $buku = \App\Models\Buku::paginate(15);
        return view('Laporan.buku', compact('buku'));
    }

    public function peminjaman()
    {
        $peminjaman = \App\Models\Pinjam_Header_Anggota::with('anggota')->paginate(15);
        return view('Laporan.peminjaman', compact('peminjaman'));
    }
}
