@extends('layouts.app')
@section('title', 'Petugas')
@section('form-title', 'Form Petugas')
@section('konten')

    <form method="POST" action="{{ route('petugas.store') }}" class="form-content mb-4">
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
            <label>Kode Petugas</label>
            <input id='KodePetugas' name='KodePetugas' type="text" value="{{ old('KodePetugas') }}">

            <label>Nama</label>
            <input id='Nama' name='Nama' type="text" value="{{ old('Nama') }}">

            <label>Jabatan</label>
            <input id='Jabatan' name='Jabatan' type="text" value="{{ old('Jabatan') }}">

            <label>Hak Akses</label>
            <select id='HakAkses' name='HakAkses' class="form-select">
                <option selected>Hak Akses</option>
                <option value="Admin">Admin</option>
                <option value="Petugas">Petugas</option>
            </select>

            <label>Password</label>
            <input id='password' name='password' type="password">
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
            <h3 class="fw-bold text-uppercase">Daftar Petugas</h3>
            <p class="mb-3 text-secondary">Berikut adalah daftar Petugas</p>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Hak Akses</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugas as $p)
                        <tr data-kode="{{ $p->KodePetugas }}">
                            <td>{{ $p->KodePetugas }}</td>
                            <td>{{ $p->Nama }}</td>
                            <td>{{ $p->Jabatan }}</td>
                            <td>{{ $p->HakAkses }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const data = @json($petugas);
        let selectedKodePetugas = null;

        $(document).ready(function() {
            $('table tbody tr').on('click', function() {
                const kode = $(this).data('kode');
                const petugas = data.find(item => item.KodePetugas === kode);

                if (!petugas) {
                    alert('Data petugas tidak ditemukan.');
                    return;
                }

                $('#KodePetugas').val(petugas.KodePetugas).prop('readonly', true);
                $('#Nama').val(petugas.Nama);
                $('#Jabatan').val(petugas.Jabatan);
                $('#HakAkses').val(petugas.HakAkses);
                $('#password').val('');

                selectedKodePetugas = petugas.KodePetugas;

                $('html, body').animate({
                    scrollTop: $('.form-content').offset().top
                }, 200);
            });

            $('#btnDelete').on('click', function() {
                if (!selectedKodePetugas) {
                    alert('Pilih data terlebih dahulu.');
                    return;
                }

                if (confirm('Apakah kamu yakin ingin menghapus data petugas ini?')) {
                    $.ajax({
                        url: `/petugas/${selectedKodePetugas}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert('Data berhasil dihapus.');
                            location.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan saat menghapus data.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
