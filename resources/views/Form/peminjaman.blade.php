@extends('layouts.app')
@section('title', 'Form Peminjaman')
@section('form-title', 'Form Peminjaman')

@section('konten')
<style>
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input, .form-group select {
        width: 100%;
        padding: 5px;
        margin-bottom: 15px;
    }

    .table-bordered td, .table-bordered th {
        text-align: center;
        vertical-align: middle;
    }

    .title-box {
        border: 1px solid black;
        text-align: center;
        padding: 10px;
        margin-bottom: 20px;
    }

    .title-box h3 {
        margin: 0;
        font-size: 20px;
    }

    .title-box p {
        margin: 0;
        font-size: 14px;
    }

    .row .form-group {
        padding: 0 10px;
    }
</style>

<form method="POST" action="{{ route('peminjaman.store') }}" class="form-content mb-4">
    @csrf
    <div class="row mb-3">
        <div class="col-md-6 form-group">
            <label for="NoPinjam">No Pinjam</label>
            <input type="text" readonly value="{{ old('NoPinjam') ?? $nextNoPinjam }}" id="NoPinjam" name="NoPinjam" required>

            <label for="TglPinjam">Tanggal Pinjam</label>
            <input type="date" id="TglPinjam" name="TglPinjam" required>

            <label for="TglKembali">Tanggal Kembali</label>
            <input type="date" id="TglKembali" name="TglKembali" required>
        </div>

        <div class="col-md-6 form-group">
            <label for="KodeAnggota">No Anggota</label>
            <input list="anggotaList" id="KodeAnggota" name="KodeAnggota" required autocomplete="off">
            <datalist id="anggotaList">
                @foreach($anggota as $a)
                    <option value="{{ $a->KodeAnggota }}">{{ $a->KodeAnggota }} - {{ $a->Nama }}</option>
                @endforeach
            </datalist>

            <label for="KodePetugas">Kode Petugas</label>
            <input type="text" id="KodePetugas" name="KodePetugas" readonly value="{{ Auth::guard('petugas')->user()->KodePetugas }}" required>
            {{-- Change value to Auth::user()->KodePetugas if Login feature is implemented --}}
        </div>
    </div>

    <hr>

    <div class="table-responsive mb-3">
        <table class="table table-bordered" id="buku-table">
            <thead>
                <tr>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody id="buku-body">
                @for ($i = 0; $i < 1; $i++)
                <tr>
                    <td>
                        <input type="text" name="buku[{{ $i }}][KodeBuku]" class="form-control" list="bukuList{{ $i }}">
                        <datalist id="bukuList{{ $i }}">
                            @foreach($buku as $bk)
                                <option value="{{ $bk->KodeBuku }}">{{ $bk->KodeBuku }} - {{ $bk->Judul }}</option>
                            @endforeach
                        </datalist>
                    </td>
                    <td><input type="text" name="buku[{{ $i }}][Judul]" class="form-control"></td>
                    <td><input type="text" name="buku[{{ $i }}][Pengarang]" class="form-control"></td>
                    <td><input type="text" name="buku[{{ $i }}][Penerbit]" class="form-control"></td>
                    <td><input type="number" name="buku[{{ $i }}][Jumlah]" min="1" value="1" class="form-control"></td>
                </tr>
                @endfor
            </tbody>
        </table>
        <button type="button" class="btn btn-light" id="add-row">Tambah Baris Buku</button>

    </div>

    <div class="form-buttons mb-5">
        <button type="reset">Tambah</button>
        <button type="submit">Simpan</button>
        <button type="submit">Ubah</button>
        <button type="button" id="btnDelete">Hapus</button>
        <button type="button">Keluar</button>
    </div>
</form>

<hr>

<div class="row">
    <div class="col px-5 py-3">
        <h3>Daftar Data Transaksi Peminjaman</h3>
        <p class="mb-3 text-secondary">Berikut adalah daftar transaksi peminjaman buku oleh anggota</p>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No Pinjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>No Anggota</th>
                        <th>Nama Anggota</th>
                        <th>Kode Petugas</th>
                        <th>Nama Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pinjamHeaderAnggota as $p)
                        <tr>
                            <td>{{ $p->NoPinjam }}</td>
                            <td>{{ $p->TglPinjam }}</td>
                            <td>{{ $p->TglKembali }}</td>
                            <td>{{ $p->KodeAnggota }}</td>
                            <td>{{ $p->anggota->Nama ?? '-' }}</td>
                            <td>{{ $p->KodePetugas }}</td>
                            <td>{{ $p->petugas->Nama ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $pinjamHeaderAnggota->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const bukuList = @json($buku);
    let rowIdx = 5;

    $('#add-row').on('click', function () {
        const row = `
            <tr>
                <td><input type="text" name="buku[${rowIdx}][KodeBuku]" class="form-control"></td>
                <td><input type="text" name="buku[${rowIdx}][Judul]" class="form-control"></td>
                <td><input type="text" name="buku[${rowIdx}][Pengarang]" class="form-control"></td>
                <td><input type="text" name="buku[${rowIdx}][Penerbit]" class="form-control"></td>
                <td><input type="number" name="buku[${rowIdx}][Jumlah]" class="form-control" value="1"></td>
                <td><button type="button" class="btn btn-light btn-sm remove-row">❌</button></td>
            </tr>
        `;
        $('#buku-body').append(row);
        rowIdx++;
    });

    $(document).on('click', '.remove-row', function () {
        $(this).closest('tr').remove();
    });

    $(document).on('input', 'input[name^="buku"][name$="[KodeBuku]"]', function () {
        const kodeBuku = $(this).val();
        const $row = $(this).closest('tr');
        const buku = bukuList.find(b => b.KodeBuku === kodeBuku);

        if (buku) {
            $row.find('input[name$="[Judul]"]').val(buku.Judul);
            $row.find('input[name$="[Pengarang]"]').val(buku.Pengarang);
            $row.find('input[name$="[Penerbit]"]').val(buku.Penerbit);
        } else {
            $row.find('input[name$="[Judul]"]').val('');
            $row.find('input[name$="[Pengarang]"]').val('');
            $row.find('input[name$="[Penerbit]"]').val('');
        }
    });
</script>
@endsection



