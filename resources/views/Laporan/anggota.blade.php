@extends('Laporan.app')
@section('title', 'Cetak Laporan')
@section('konten')

    <div class="text-center mt-0" style="display: flex; align-items: center; justify-content: center;">
        Laporan Anggota Perpustakaan
    </div>

    <div class="form-content tanggal mb-4">
        Tanggal : {{ date('d-m-Y') }}
    </div>
    <div class="table table-bordered table-striped">
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
            @foreach ($anggota as $a)
                <tr style="cursor: pointer;" class="row-clickable" data-id="{{ $a->KodeAnggota }}">
                    <td>{{ $a->KodeAnggota }}</td>
                    <td>{{ $a->Nama }}</td>
                    <td>{{ $a->Alamat }}</td>
                    <td>{{ $a->NoTelp }}</td>
                    <td>{{ $a->Email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $anggota->links('pagination::bootstrap-5') }}
    </div>

     <div class="d-flex justify-content-end mt-5">
        <div style="text-align: right; min-width: 220px; margin-right: 40px;">
            <span style="font-weight: bold; font-size: 1.1rem; color: #333;">Mengetahui,<br>Kepala Perpustakaan</span>
            <br><br><br>
            <span style="display: block; margin-top: 30px; font-size: 1.05rem; color: #555;">( Iin Gantihar )</span>
        </div>
    </div>

@endsection
