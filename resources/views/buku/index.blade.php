@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Buku</h3>
    <a href="{{ route('buku.create') }}" class="btn btn-primary">+ Tambah Buku</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th><th>Kode</th><th>Judul</th><th>Penulis</th>
            <th>Penerbit</th><th>Tahun</th><th>Stok</th><th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($buku as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kode_buku }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->penulis }}</td>
            <td>{{ $item->penerbit }}</td>
            <td>{{ $item->tahun_terbit }}</td>
            <td>{{ $item->stok }}</td>
            <td>
                <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('buku.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="8" class="text-center">Belum ada data buku.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $buku->links() }}
@endsection
