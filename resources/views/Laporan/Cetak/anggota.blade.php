@extends('Laporan.Cetak.app')
@section('title', 'Laporan Anggota')
@section('konten')

    <h2 class="report-title"><i class="fas fa-users me-2"></i> Laporan Anggota Perpustakaan</h2>

    <div class="report-date">
        <i class="fas fa-calendar-alt me-2"></i> <strong>Tanggal:</strong> {{ date('d-m-Y') }}
    </div>

    <table>
        <thead>
            <tr>
                <th width="15%">Kode Anggota</th>
                <th width="25%">Nama</th>
                <th width="25%">Alamat</th>
                <th width="15%">No. Telepon</th>
                <th width="20%">Email</th>
            </tr>
        </thead>
        <tbody>
            @if(count($anggota) > 0)
                @foreach ($anggota as $a)
                    <tr>
                        <td><span style="font-weight: bold; color: #3498db;">{{ $a->KodeAnggota }}</span></td>
                        <td>{{ $a->Nama }}</td>
                        <td>{{ $a->Alamat }}</td>
                        <td>
                            @if($a->NoTelp)
                                <i class="fas fa-phone-alt me-1" style="color: #7f8c8d;"></i> {{ $a->NoTelp }}
                            @else
                                <span style="color: #7f8c8d;">-</span>
                            @endif
                        </td>
                        <td>
                            @if($a->Email)
                                <i class="fas fa-envelope me-1" style="color: #7f8c8d;"></i> {{ $a->Email }}
                            @else
                                <span style="color: #7f8c8d;">-</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center" style="padding: 30px; color: #7f8c8d;">
                        <i class="fas fa-info-circle me-2"></i> Tidak ada data anggota yang tersedia
                    </td>
                </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: right; padding: 15px; background-color: #f1f5f9; font-weight: bold;">
                    <i class="fas fa-users me-1"></i> Total Anggota: <span style="color: #3498db;">{{ count($anggota) }}</span>
                </td>
            </tr>
        </tfoot>
    </table>

@endsection
