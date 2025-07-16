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
                <th>Kode Anggota</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>NoTelepon</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $p)
                <tr>
                    <td>{{ $p->anggota->KodeAnggota ?? '-' }}</td>
                    <td>{{ $p->anggota->Nama ?? '-' }}</td>
                    <td>{{ $p->anggota->Alamat ?? '-' }}</td>
                    <td>{{ $p->anggota->NoTelp ?? '-' }}</td>
                    <td>{{ $p->anggota->Email ?? '-' }}</td>
                </tr>
            @endforeach
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
