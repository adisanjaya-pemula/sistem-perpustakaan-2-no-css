@extends('layouts.app')

@section('content')
<h3>Edit Peminjaman</h3>
<form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Buku</label>
        <input type="text" class="form-control" value="{{ $peminjaman->buku->judul }}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Anggota</label>
        <input type="text" class="form-control" value="{{ $peminjaman->anggota->nama }}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="form-control" value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="dipinjam" {{ $peminjaman->status === 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            <option value="dikembalikan" {{ $peminjaman->status === 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
