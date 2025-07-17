@extends('Laporan.app')
@section('title', 'Peminjaman Aggota')
@section('konten')

    <div class="text-center mt-0" style="display: flex; align-items: center; justify-content: center;">
        Laporan Data Peminjaman
    </div>

    <div class="form-content tanggal mb-4">
        Tanggal : {{ date('d-m-Y') }}
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NoPinjam</th>
                <th>Tanggal Pinjam</th>
                <th>Kode Anggota</th>
                <th>Nama Anggota</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @if(count($peminjaman) > 0)
            @foreach ($peminjaman as $p)
                <tr>
                    <td>{{ $p->NoPinjam }}</td>
                    <td>{{ date('d-m-Y', strtotime($p->TglPinjam)) }}</td>
                    <td>{{ $p->KodeAnggota }}</td>
                    <td>{{ $p->anggota->Nama ?? 'Tidak ditemukan' }}</td>
                    <t6/d>{{ date('d-m-Y', strtotime($p->TglKembali)) }}</td>
                    <td>
                        @if($p->Status == 'Dipinjam')
                            <span style="color: #e74c3c; font-weight: bold;">
                                <i class="fas fa-book me-1"></i> {{ $p->Status }}
                            </span>
                        @elseif($p->Status == 'Dikembalikan')
                            <span style="color: #27ae60; font-weight: bold;">
                                <i class="fas fa-check-circle me-1"></i> {{ $p->Status }}
                            </span>
                        @else
                            {{ $p->Status }}
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center" style="padding: 30px; color: #7f8c8d;">
                    <i class="fas fa-info-circle me-2"></i> Tidak ada data peminjaman yang tersedia
                </td>
            </tr>
        @endif
        </tbody>
        {{ $peminjaman->links('pagination::bootstrap-5') }}
    </table>


    <div class="d-flex justify-content-end mt-5">
        <div style="text-align: right; min-width: 220px; margin-right: 40px;">
            <span style="font-weight: bold; font-size: 1.1rem; color: #333;">Mengetahui,<br>Kepala Perpustakaan</span>
            <br><br><br>
            <span style="display: block; margin-top: 30px; font-size: 1.05rem; color: #555;">( Iin Gantihar )</span>
        </div>
    </div>

@endsection
