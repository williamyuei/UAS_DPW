@extends('layouts.app')
@section('title', 'Form Pengembalian')
@section('form-title', 'Form Pengembalian')

@section('konten')
    <style>
        body {
            background: #f7f7f7;
        }
        .form-group-custom {
            display: flex;
            align-items: center;
            margin-bottom: 14px;
        }
        .form-group-custom label {
            width: 160px;
            font-weight: 500;
            margin-right: 10px;
            color: #333;
        }
        .form-group-custom input,
        .form-group-custom select {
            flex: 1;
            padding: 8px 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fff;
            transition: border 0.2s;
        }
        .form-group-custom input:focus,
        .form-group-custom select:focus {
            border: 1.5px solid #888;
            outline: none;
        }
        form#formPengembalian {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            padding: 32px 24px 24px 24px;
            margin-bottom: 32px;
            width: 100%;
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        .form-container-wrapper {
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }
        .instansi-box {
            text-align: center;
            margin-bottom: 28px;
            padding: 18px 10px 10px 10px;
            background: #f5f5f5;
            border-radius: 8px;
            border: 1.5px solid #e0e0e0;
        }
        .instansi-box div:first-child {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 4px;
            color: #222;
        }
        .instansi-box div:last-child {
            font-size: 1rem;
            color: #555;
        }
        .form-title {
            text-align: center;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 18px;
            color: #444;
        }
        .button-group-custom {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 24px;
        }
        .button-group-custom button {
            flex: 1 1 120px;
            font-size: 1.1rem;
            padding: 10px 0;
            border-radius: 6px;
            border: none;
            background: #e0e0e0;
            color: #222;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .button-group-custom button:hover {
            background: #bfc2c5;
        }
        .row {
            margin-left: 0;
            margin-right: 0;
        }
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        .table {
            width: 100%;
            background: #fff;
            border-radius: 8px;
            border-collapse: collapse;
            margin-bottom: 0;
        }
        .table th, .table td {
            border: 1px solid #e0e0e0;
            padding: 10px 12px;
            text-align: center;
            font-size: 1rem;
        }
        .table th {
            background: #f5f5f5;
            font-weight: 600;
            color: #333;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background: #fafbfc;
        }
        h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: #333;
        }
        .mb-3.text-secondary {
            color: #888 !important;
            font-size: 1rem;
        }
        @media (max-width: 700px) {
            form#formPengembalian {
                padding: 18px 6px 12px 6px;
            }
            .form-group-custom {
                flex-direction: column;
                align-items: flex-start;
            }
            .form-group-custom label {
                width: 100%;
                margin-bottom: 4px;
            }
            .form-group-custom input,
            .form-group-custom select {
                width: 100%;
            }
            .button-group-custom {
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
    <div class="form-container-wrapper">
    <form id="formPengembalian">
        @csrf
        <div class="form-group-custom">
            <label for="no_kembali">No Kembali</label>
            <input type="text" id="no_kembali" name="no_kembali" required
                value="{{ isset($nextKembaliNumber) ? $nextKembaliNumber : '' }}">
        </div>
        <div class="form-group-custom">
            <label for="no_pinjam">No Pinjam</label>
            <select id="no_pinjam" name="no_pinjam" required>
                <option value="">-- Pilih No Pinjam --</option>
                @if(isset($peminjaman))
                    @foreach($peminjaman as $pinjam)
                        <option value="{{ $pinjam->NoPinjam }}" data-tglpinjam="{{ $pinjam->TglPinjam }}" data-tglkembali="{{ $pinjam->TglKembali }}">
                            {{ $pinjam->NoPinjam }} - {{ $pinjam->anggota->Nama ?? '' }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group-custom">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="date" id="tgl_pinjam" name="tgl_pinjam" readonly>
        </div>
        <div class="form-group-custom">
            <label for="tgl_kembali">Tanggal kembali</label>
            <input type="date" id="tgl_kembali" name="tgl_kembali" readonly>
        </div>
        <div class="form-group-custom">
            <label for="tgl_pengembalian">Tanggal Pengembalian</label>
            <input type="date" id="tgl_pengembalian" name="tgl_pengembalian" required>
        </div>
        <div class="form-buttons mt-3">
            <button type="button" id="btnTambah">Tambah</button>
            <button type="submit" id="btnSimpan">Simpan</button>
            <button type="button" id="btnUbah">Ubah</button>
            <button type="button" id="btnHapus">Hapus</button>
            <button type="button" id="btnKeluar" onclick="window.location.href='{{ route('menu') }}'">Keluar</button>
        </div>
    </form>
    </div>


    @if(isset($peminjaman) && count($peminjaman) > 0)
        <hr>
        <div class="row">
            <div class="col px-5 py-3">
                <h3>Daftar Data Transaksi Pengembalian</h3>
                <p class="mb-3 text-secondary">Berikut adalah daftar transaksi pengembalian buku oleh anggota</p>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pinjam</th>
                                <th>Nama Anggota</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $i => $pinjam)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $pinjam->NoPinjam }}</td>
                                    <td>{{ $pinjam->anggota->Nama ?? '' }}</td>
                                    <td>{{ $pinjam->TglPinjam }}</td>
                                    <td>{{ $pinjam->TglKembali }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

                <script>
                    // Inisialisasi tanggal pengembalian dengan hari ini
                    document.addEventListener('DOMContentLoaded', function () {
                        const today = new Date();
                        const yyyy = today.getFullYear();
                        const mm = String(today.getMonth() + 1).padStart(2, '0');
                        const dd = String(today.getDate()).padStart(2, '0');
                        const todayStr = `${yyyy}-${mm}-${dd}`;
                        document.getElementById('tgl_pengembalian').value = todayStr;

                        // Event listener untuk tombol
                        document.getElementById('btnTambah').addEventListener('click', resetForm);
                        document.getElementById('btnKeluar').addEventListener('click', function () {
                            window.location.href = "{{ route('menu') }}";
                        });

                        // Event listener untuk memuat data peminjaman saat dropdown berubah
                        document.getElementById('no_pinjam').addEventListener('change', function () {
                            var selected = this.options[this.selectedIndex];
                            var tglPinjam = selected.getAttribute('data-tglpinjam') || '';
                            var tglKembali = selected.getAttribute('data-tglkembali') || '';
                            function ambilTanggal(str) {
                                if (!str) return '';
                                if (str.includes(' ')) return str.split(' ')[0];
                                if (str.includes('T')) return str.split('T')[0];
                                return str;
                            }
                            document.getElementById('tgl_pinjam').value = ambilTanggal(tglPinjam);
                            document.getElementById('tgl_kembali').value = ambilTanggal(tglKembali);
                        });
                    });

                    function resetForm() {
                        document.getElementById('formPengembalian').reset();
                        const today = new Date();
                        const yyyy = today.getFullYear();
                        const mm = String(today.getMonth() + 1).padStart(2, '0');
                        const dd = String(today.getDate()).padStart(2, '0');
                        const todayStr = `${yyyy}-${mm}-${dd}`;
                        document.getElementById('tgl_pengembalian').value = todayStr;
                    }
                </script>
@endsection