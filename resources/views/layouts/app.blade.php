<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="card shadow-lg">
            <div class="card-header text-center bg-secondary text-white">
                <h2 class="mb-0">Perpustakaan Daerah Kabupaten Sumbawa</h2>
                <small class="d-block">Jl. Setia Budi No.12A, Seketeng, Kec. Sumbawa, Kabupaten Sumbawa</small>
            </div>

            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                    <!-- File -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            File
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}" target="_blank">Login</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Exit</a></li>
                        </ul>
                    </div>

                    <!-- Database -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            Database
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('buku.index') }}">Buku</a></li>
                            <li><a class="dropdown-item" href="{{ route('anggota.index') }}">Anggota</a></li>
                        </ul>
                    </div>

                    <!-- Transaksi -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            Transaksi
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('peminjaman.index') }}">Peminjaman</a></li>
                            <li><a class="dropdown-item" href="{{ route('pengembalian.index') }}">Pengembalian</a></li>
                        </ul>
                    </div>

                    <!-- Laporan -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            Laporan
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('laporan.index') }}" target="_blank">Menu</a></li>
                            <li><a class="dropdown-item" href="{{ route('laporan.buku') }}">Buku</a></li>
                            <li><a class="dropdown-item" href="{{ route('laporan.anggota') }}">Anggota</a></li>
                            <li><a class="dropdown-item" href="{{ route('laporan.peminjaman') }}">Peminjaman</a></li>
                        </ul>
                    </div>

                    <!-- Pengaturan -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            Pengaturan
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Aturan Main</a></li>
                            <li><a class="dropdown-item" href="{{ route('petugas.index') }}">Petugas</a></li>
                        </ul>
                    </div>

                    <!-- Windows -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            Windows
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cascade</a></li>
                            <li><a class="dropdown-item" href="#">Horizontal</a></li>
                            <li><a class="dropdown-item" href="#">Vertikal</a></li>
                        </ul>
                    </div>
                    <div>
                        <button class="btn btn-danger" onclick="window.close()">X</button>
                    </div>
                </div>

                <div class="card mt-3 mb-2">
                    <div class="card-header text-center">
                        @yield('form-title')
                    </div>
                    <div class="card-body">
                        <div class="container border mb-4">
                            <h4 class="text-center mt-3">Perpustakaan Daerah Kabupaten Sumbawa</h4>
                            <p class="text-center">Jl. Setia Budi No.12A, Seketeng, Kec. Sumbawa, Kabupaten Sumbawa</p>
                        </div>
                    </div>
                    @yield('konten')
                </div>
                <div class="border mb-0 text-center mt-3"
                    style="height: 50px; line-height: 50px; background-color: #f8f9fa;">
                    @session('success')
                    <strong>{{ session('success') }}</strong>
                    @else
                    <strong>Status Bar</strong>
                    @endsession
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
</body>

</html>
