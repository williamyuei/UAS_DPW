@extends('Laporan.Cetak.app')
@section('title', 'Laporan Buku')
@section('konten')

<h2 class="report-title"><i class="fas fa-book me-2"></i> Laporan Keadaan Buku</h2>

<div class="report-date">
    <i class="fas fa-calendar-alt me-2"></i> <strong>Tanggal:</strong> {{ date('d-m-Y') }}
</div>

<table>
    <thead>
        <tr>
            <th width="12%">Kode Buku</th>
            <th width="28%">Judul</th>
            <th width="20%">Pengarang</th>
            <th width="20%">Penerbit</th>
            <th width="10%">Kondisi</th>
            <th width="10%">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @if(count($buku) > 0)
            @foreach ($buku as $b)
                <tr>
                    <td><span style="font-weight: normal; color: #070707;">{{ $b->KodeBuku }}</span></td>
                    <td><span style="font-weight: normal; color: #070707;">{{ $b->Judul }}</span></td>
                    <td>
                        @if($b->Pengarang)
                            <i class="fas fa-user-edit me-1" style="color: #070707;"></i> {{ $b->Pengarang }}
                        @else
                            <span style="color: #070707;">-</span>
                        @endif
                    </td>
                    <td>
                        @if($b->Penerbit)
                            <i class="fas fa-building me-1" style="color: #070707;"></i> {{ $b->Penerbit }}
                        @else
                            <span style="color: #070707;">-</span>
                        @endif
                    </td>
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
        @else
            <tr>
                <td colspan="6" class="text-center" style="padding: 30px; color: #070707;">
                    <i class="fas fa-info-circle me-2"></i> Tidak ada data buku yang tersedia
                </td>
            </tr>
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: right; padding: 15px; background-color: #f1f5f9; font-weight: normal;">
                <i class="fas fa-book me-1"></i> Total Buku:
            </td>
            <td style="text-align: center; padding: 15px; background-color: #f1f5f9; font-weight: normal;">
                <span style="color: #070707;">{{ $buku->sum('JumEksemplar') }}</span>
            </td>
        </tr>
    </tfoot>
</table>

@endsection
