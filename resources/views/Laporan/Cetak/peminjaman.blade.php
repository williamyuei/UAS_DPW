@extends('Laporan.Cetak.app')
@section('title', 'Laporan Peminjaman')
@section('konten')

<h2 class="report-title">Laporan Data Peminjaman</h2>

<div class="report-date">
    <i class="fas fa-calendar-alt me-2"></i> <strong>Tanggal:</strong> {{ date('d-m-Y') }}
</div>

<table>
    <thead>
        <tr>
            <th width="15%">No Pinjam</th>
            <th width="15%">Tanggal Pinjam</th>
            <th width="15%">Kode Anggota</th>
            <th width="20%">Nama Anggota</th>
            <th width="15%">Tanggal Kembali</th>
            <th width="20%">Status</th>
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
                    <td>{{ date('d-m-Y', strtotime($p->TglKembali)) }}</td>
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
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: right; padding: 15px; background-color: #f1f5f9; font-weight: bold;">
                Total Peminjaman:
            </td>
            <td style="padding: 15px; background-color: #f1f5f9; font-weight: bold;">
                {{ count($peminjaman) }}
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: right; padding: 15px; background-color: #f1f5f9; font-weight: bold;">
                Status Dipinjam:
            </td>
            <td style="padding: 15px; background-color: #f1f5f9; font-weight: bold;">
                {{ $peminjaman->where('Status', 'Dipinjam')->count() }}
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: right; padding: 15px; background-color: #f1f5f9; font-weight: bold;">
                Status Dikembalikan:
            </td>
            <td style="padding: 15px; background-color: #f1f5f9; font-weight: bold;">
                {{ $peminjaman->where('Status', 'Dikembalikan')->count() }}
            </td>
        </tr>
    </tfoot>
</table>

@endsection
