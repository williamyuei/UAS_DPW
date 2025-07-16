<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Kembali_Anggota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Pinjam_Detail_Anggota;
use App\Models\Pinjam_Header_Anggota;

class KembaliAnggotaController extends Controller
{
    public function index()
    {
        // Data pengembalian (untuk tabel)
        $kembali = Kembali_Anggota::with(['pinjamHeader.anggota', 'pinjamHeader.detail.buku'])->get();

        // Data peminjaman yang belum dikembalikan (untuk dropdown)
        $peminjaman = \App\Models\Pinjam_Header_Anggota::with('anggota')
            ->whereNotIn('NoPinjam', function($query) {
                $query->select('NoPinjam')->from('kembali_anggota');
            })
            ->get();

        // Generate nomor pengembalian berikutnya
        $lastKembali = Kembali_Anggota::latest('NoKembali')->first();
        $nextNumber = $lastKembali ? ((int) substr($lastKembali->NoKembali, 2)) + 1 : 1;
        $nextKembaliNumber = 'KB' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        return view('Form.pengembalian', compact('kembali', 'peminjaman', 'nextKembaliNumber'));
    }
}
