@extends('layouts.app')
@section('title', 'Anggota')
@section('form-title', 'Form anggota')
@section('konten')
    <form method="POST" action="{{ route('anggota.store') }}" class="form-content mb-4">
      @if ($errors->any())
          <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
              <strong>Terjadi kesalahan:</strong>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      @csrf
      <div class="form-group">
          <label>KodeAnggota</label>
          <input id="KodeAnggota" name="KodeAnggota" type="text" value="{{ old('KodeAnggota') }}">

          <label>Nama</label>
          <input id="Nama" name="Nama" type="text" value="{{ old('Nama') }}">

          <label>TTL</label>
          <input id="TTL" name="TTL" type="text" value="{{ old('TTL') }}">

          <label>Alamat</label>
          <textarea id="Alamat" name="Alamat" cols="30" rows="5">{{ old('Alamat') }}</textarea>

          <label>Kode Pos</label>
          <input id="KodePos" name="KodePos" type="text" value="{{ old('KodePos') }}">

          <label>NoTelp</label>
          <input id="NoTelp" name="NoTelp" type="text" value="{{ old('NoTelp') }}">

          <label>Hp</label>
          <input id="Hp" name="Hp" type="text" value="{{ old('Hp') }}">

          <label>TglDaftar</label>
          <input id="TglDaftar" name="TglDaftar" type="date" value="{{ old('TglDaftar') }}">

          <label>Email</label>
          <input id="Email" name="Email" type="email" value="{{ old('Email') }}">
      </div>



      <div class="form-buttons">
        <button type="reset">Tambah</button>
        <button type="submit">Simpan</button>
        <button type="submit">Ubah</button>
        <button id="btnDelete" type="button">Hapus</button>
        <button type="button">Keluar</button>
      </div>
    </form>

    <div class="row mt-5">
      <div class="col p-5">
        <h3 class="fw-bold text-uppercase">Daftar Data Anggota</h3>
        <p class="mb-3 text-secondary">Berikut adalah daftar data anggota perpustakaan</p>
        <div class="table table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Kode Anggota</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>Alamat</th>
                <th>Kode POS</th>
                <th>No Telp</th>
                <th>Hp</th>
                <th>Email</th>
                <th>Tgl Daftar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($anggota as $a)
              <tr style="cursor: pointer;" class="row-clickable" data-id="{{ $a->KodeAnggota }}">
                <td>{{ $a->KodeAnggota }}</td>
                <td>{{ $a->Nama }}</td>
                <td>{{ $a->TTL }}</td>
                <td>{{ $a->Alamat }}</td>
                <td>{{ $a->KodePos }}</td>
                <td>{{ $a->NoTelp }}</td>
                <td>{{ $a->Hp }}</td>
                <td>{{ $a->Email }}</td>
                <td>{{ $a->TglDaftar }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{ $anggota->links('pagination::bootstrap-5') }}

      </div>
    </div>
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let selectedKodeAnggota = null;

    $(document).ready(function () {
        // Klik baris tabel, isi form dan simpan kode anggota
        $('table tbody tr').on('click', function () {
            var data = $(this).children('td').map(function () {
                return $(this).text().trim();
            }).get();

            $('#KodeAnggota').val(data[0]).prop('readonly', true);
            // $('#KodeAnggota').prop('readonly', true);
            $('#Nama').val(data[1]);
            $('#TTL').val(data[2]);
            $('#Alamat').val(data[3]);
            $('#KodePos').val(data[4]);
            $('#NoTelp').val(data[5]);
            $('#Hp').val(data[6]);
            $('#Email').val(data[7]);
            $('#TglDaftar').val(data[8]);

            // Simpan kode anggota ke variabel
            selectedKodeAnggota = data[0];

            // Scroll ke form
            $('html, body').animate({
                scrollTop: $('.form-content').offset().top
            }, 200);
        });

        // Fungsi hapus via AJAX
        $('#btnDelete').on('click', function () {
            if (!selectedKodeAnggota) {
                alert('Pilih data terlebih dahulu.');
                return;
            }

            if (confirm('Apakah kamu yakin ingin menghapus data anggota ini?')) {
              console.log(selectedKodeAnggota);
                $.ajax({
                    url: `/anggota/${selectedKodeAnggota}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        alert('Data berhasil dihapus.');
                        location.reload();
                    },
                    error: function (xhr) {
                        alert('Terjadi kesalahan saat menghapus data.');
                    }
                });
            }
        });
    });
</script>
@endsection

