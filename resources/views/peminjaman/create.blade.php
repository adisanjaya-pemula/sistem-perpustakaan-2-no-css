@extends('layouts.app')

@section('content')
<h3>Tambah Peminjaman</h3>
<form action="{{ route('peminjaman.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Buku</label>
        <select name="buku_id" class="form-control">
            <option value="">-- Pilih Buku --</option>
            @foreach ($buku as $b)
            <option value="{{ $b->id }}">{{ $b->judul }} (Stok: {{ $b->stok }})</option>
            @endforeach
        </select>
        @error('buku_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Anggota</label>
        <select name="anggota_id" class="form-control">
            <option value="">-- Pilih Anggota --</option>
            @foreach ($anggota as $a)
            <option value="{{ $a->id }}">{{ $a->nama }}</option>
            @endforeach
        </select>
        @error('anggota_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" class="form-control" value="{{ old('tanggal_pinjam') }}">
        @error('tanggal_pinjam') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
