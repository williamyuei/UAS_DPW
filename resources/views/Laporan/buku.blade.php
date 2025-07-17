@extends('Laporan.app')
@section('title', 'Peminjaman Buku')
@section('konten')

<div class="text-center mt-0"  style="display: flex; align-items: center; justify-content: center;">
    Laporan Keadaan Buku
</div>

<div class="form-content tanggal mb-4">
    Tanggal : {{ date('d-m-Y') }}
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Kondisi</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    @foreach ($buku as $b)
    <tbody>
        <tr>
            <td>{{ $b->KodeBuku }}</td>
            <td>{{ $b->Judul }}</td>
            <td>{{ $b->Pengarang ?? '-' }}</td>
            <td>{{ $b->Penerbit ?? '-' }}</td>
            <td style="text-align: center;">
                @if($b->JumEksemplar > 0)
                    <span style="font-weight: normal; color: #070707;">
                        <i class="fas fa-check-circle me-1"></i> Tersedia
                    </span>
                @else
                    <span style="font-weight: normal; color: #070707;">
                        <i class="fas fa-times-circle me-1"></i> Tidak Tersedia
                    </span>
                @endif
            </td>
            <td style="text-align: center;">
                @if($b->JumEksemplar > 0)
                    <i class="fas fa-calendar-day me-1" style="color: #070707;"></i> {{ $b->JumEksemplar }}
                @else
                    <span style="color: #070707;">-</span>
                @endif
            </td>
        </tr>
        
    @endforeach
    </tbody>

    <div class="table-footer">
        <tr>
            <td colspan="5" style="text-align: right; padding: 15px; background-color: #f1f5f9; font-weight: normal;">
                <i class="fas fa-book me-1"></i> Total Buku:
            </td>
            <td style="text-align: center; padding: 15px; background-color: #f1f5f9; font-weight: normal;">
                <span style="color: #070707;">{{ $buku->sum('JumEksemplar') }}</span>
            </td>
        </tr>
    </div>
    </table>
{{ $buku->links('pagination::bootstrap-5') }}

     <div class="d-flex justify-content-end mt-5">
        <div style="text-align: right; min-width: 220px; margin-right: 40px;">
            <span style="font-weight: bold; font-size: 1.1rem; color: #333;">Mengetahui,<br>Kepala Perpustakaan</span>
            <br><br><br>
            <span style="display: block; margin-top: 30px; font-size: 1.05rem; color: #555;">( Iin Gantihar )</span>
        </div>
    </div>

@endsection
