<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Dialog Pencetakan Pelaporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 80px;
            height: 100vh;
            margin: 0;
        }

        .dialog-container {
            width: 600px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
        }

        .dialog-header {
            background-color: #ddd;
            padding: 8px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dialog-title {
            font-weight: bold;
            font-size: 16px;
        }

        .close-btn {
            background-color: #ff5252;
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        .library-header {
            text-align: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .library-name {
            margin: 0;
            font-weight: bold;
            font-size: 18px;
        }

        .library-address {
            margin: 8px 0 0 0;
            font-size: 14px;
        }

        .form-content {
            display: flex;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .checkbox-group {
            flex: 1;
        }

        .radio-group {
            width: 150px;
            border-left: 1px solid #eee;
            padding-left: 20px;
        }

        .form-check {
            margin-bottom: 15px;
        }

        .form-check-input {
            margin-right: 10px;
            transform: scale(1.2);
        }

        .form-check-label {
            font-size: 16px;
            cursor: pointer;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 20px;
        }

        .action-button {
            padding: 12px;
            border: none;
            background-color: #e0e0e0;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            font-weight: bold;
        }

        .action-button:hover {
            background-color: #d0d0d0;
        }

        .alert {
            padding: 15px;
            background-color: #f8d7da;
            color: #721c24;
            margin: 15px;
            font-size: 15px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="dialog-container">
    <div class="dialog-header">
        <div class="dialog-title">Form Dialog Pencetakan Pelaporan</div>
        <button class="close-btn" onclick="window.close()">X</button>
    </div>
    
    <div class="library-header">
        <p class="library-name">Perpustakaan Daerah Kabupaten Sumbawa</p>
        <p class="library-address">Jl.Setia Budi No.12A, Seketeng, Kec. Sumbawa, Kabupaten Sumbawa</p>
    </div>

    @if(session('error'))
    <div class="alert">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('cetak.multiple') }}" method="POST" id="formCetak">
        @csrf
        <div class="form-content">
            <div class="checkbox-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lap_buku" name="lap_buku" value="1">
                    <label class="form-check-label" for="lap_buku">Laporan Buku</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lap_anggota" name="lap_anggota" value="1">
                    <label class="form-check-label" for="lap_anggota">Laporan Anggota</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lap_pinjam" name="lap_pinjam" value="1">
                    <label class="form-check-label" for="lap_pinjam">Laporan Data Peminjaman</label>
                </div>
            </div>
            <div class="radio-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="output" id="printer" value="printer" checked>
                    <label class="form-check-label" for="printer">Printer</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="output" id="layar" value="layar">
                    <label class="form-check-label" for="layar">Layar</label>
                </div>
            </div>
        </div>

        <div class="button-group">
            <button type="submit" class="action-button">Cetak</button>
            <button type="reset" class="action-button">Batal</button>
            <button type="button" class="action-button" onclick="window.close()">Keluar</button>
        </div>
    </form>
</div>

<script>
document.getElementById('formCetak').addEventListener('submit', function(e) {
    const lapBuku = document.getElementById('lap_buku').checked;
    const lapAnggota = document.getElementById('lap_anggota').checked;
    const lapPinjam = document.getElementById('lap_pinjam').checked;

    if (!lapBuku && !lapAnggota && !lapPinjam) {
        e.preventDefault();
        alert('Pilih minimal satu jenis laporan!');
    }
});
</script>

</body>
</html>
