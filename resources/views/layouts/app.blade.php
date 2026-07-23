<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Peminjaman Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('peminjaman.index') }}">Perpustakaan</a>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('buku.index') }}">Buku</a>
            <a class="nav-link" href="{{ route('anggota.index') }}">Anggota</a>
            <a class="nav-link" href="{{ route('peminjaman.index') }}">Peminjaman</a>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>
</body>
</html>
