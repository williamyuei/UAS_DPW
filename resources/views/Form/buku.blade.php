@extends('layouts.app')
@section('title', 'Buku')
@section('form-title', 'Form Buku')
@section('konten')
    <form method="POST" action="{{ route('buku.store') }}" class="form-content mb-4">
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
          <label>Kode Buku</label>
          <input id="KodeBuku" name="KodeBuku" type="text" value="{{ old('KodeBuku') }}">

          <label>No UDC</label>
          <input id="NoUDC" name="NoUDC" type="text" value="{{ old('NoUDC') }}">

          <label>No Reg</label>
          <input id="NoReg" name="NoReg" type="text" value="{{ old('NoReg') }}">

          <label>Judul</label>
          <textarea id="Judul" name="Judul" cols="30" rows="2">{{ old('Judul') }}</textarea>

          <label>Penerbit</label>
          <input id="Penerbit" name="Penerbit" type="text" value="{{ old('Penerbit') }}">

          <label>Pengarang</label>
          <input id="Pengarang" name="Pengarang" type="text" value="{{ old('Pengarang') }}">

          <label>Tahun Terbit</label>
          <input id="TahunTerbit" name="TahunTerbit" type="number" value="{{ old('TahunTerbit') }}">

          <label>Kota Terbit</label>
          <input id="KotaTerbit" name="KotaTerbit" type="text" value="{{ old('KotaTerbit') }}">

          <label>Bahasa</label>
          <input id="Bahasa" name="Bahasa" type="text" value="{{ old('Bahasa') }}">

          <label>Edisi</label>
          <input id="Edisi" name="Edisi" type="text" value="{{ old('Edisi') }}">

          <label>Deskripsi</label>
          <textarea id="Deskripsi" name="Deskripsi" cols="30" rows="2">{{ old('Deskripsi') }}</textarea>

          <label>ISBN</label>
          <input id="ISBN" name="ISBN" type="text" value="{{ old('ISBN') }}">

          <label>Jumlah Eksemplar</label>
          <input id="JumEksemplar" name="JumEksemplar" type="number" value="{{ old('JumEksemplar') }}">

          <label>Subyek Utama</label>
          <textarea id="SubyekUtama" name="SubyekUtama" cols="30" rows="2">{{ old('SubyekUtama') }}</textarea>

          <label>Subyek Tambahan</label>
          <textarea id="SubyekTambahan" name="SubyekTambahan" cols="30" rows="2">{{ old('SubyekTambahan') }}</textarea>
      </div>

      <div class="form-buttons mt-3">
        <button type="reset">Tambah</button>
        <button type="submit">Simpan</button>
        <button type="submit">Ubah</button>
        <button id="btnDelete" type="button">Hapus</button>
        <button type="button">Keluar</button>
      </div>
    </form>

    <div class="row mt-5">
      <div class="col p-5">
        <h3 class="fw-bold text-uppercase">Daftar Data Buku</h3>
        <p class="mb-3 text-secondary">Berikut adalah daftar koleksi buku</p>
        <div class="table table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Kota</th>
                <th>ISBN</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($buku as $index => $b)
              <tr style="cursor: pointer;" class="row-clickable"  data-kode="{{ $b->KodeBuku }}" data-id="{{ $index }}">
                <td>{{ $b->KodeBuku }}</td>
                <td>{{ $b->Judul }}</td>
                <td>{{ $b->Pengarang }}</td>
                <td>{{ $b->Penerbit }}</td>
                <td>{{ $b->TahunTerbit }}</td>
                <td>{{ $b->KotaTerbit }}</td>
                <td>{{ $b->ISBN }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{ $buku->links('pagination::bootstrap-5') }}
      </div>
    </div>
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let selectedKodeBuku = null;
    const data = @json($buku->items());

    $(document).ready(function () {
         $('table tbody tr').on('click', function () {
            const kode = $(this).data('kode');
            const buku = data.find(item => item.KodeBuku === kode); // ✅ aman

            if (!buku) {
                alert('Data buku tidak ditemukan.');
                return;
            }

            $('#KodeBuku').val(buku.KodeBuku).prop('readonly', true);
            $('#NoUDC').val(buku.NoUDC);
            $('#NoReg').val(buku.NoReg);
            $('#Judul').val(buku.Judul);
            $('#Pengarang').val(buku.Pengarang);
            $('#Penerbit').val(buku.Penerbit);
            $('#TahunTerbit').val(buku.TahunTerbit);
            $('#KotaTerbit').val(buku.KotaTerbit);
            $('#Bahasa').val(buku.Bahasa);
            $('#Edisi').val(buku.Edisi);
            $('#Deskripsi').val(buku.Deskripsi);
            $('#ISBN').val(buku.ISBN);
            $('#JumEksemplar').val(buku.JumEksemplar);
            $('#SubyekUtama').val(buku.SubyekUtama);
            $('#SubyekTambahan').val(buku.SubyekTambahan);

            selectedKodeBuku = buku.KodeBuku;

            $('html, body').animate({
                scrollTop: $('.form-content').offset().top
            }, 200);
        });

        $('#btnDelete').on('click', function () {
            if (!selectedKodeBuku) {
                alert('Pilih data terlebih dahulu.');
                return;
            }

            if (confirm('Apakah kamu yakin ingin menghapus data buku ini?')) {
                $.ajax({
                    url: `/buku/${selectedKodeBuku}`,
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
