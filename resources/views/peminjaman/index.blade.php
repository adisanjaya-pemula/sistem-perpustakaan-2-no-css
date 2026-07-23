@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Peminjaman</h3>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">+ Tambah Peminjaman</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th><th>Buku</th><th>Anggota</th><th>Tgl Pinjam</th>
            <th>Tgl Kembali</th><th>Status</th><th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($peminjaman as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->buku->judul ?? '-' }}</td>
            <td>{{ $item->anggota->nama ?? '-' }}</td>
            <td>{{ $item->tanggal_pinjam }}</td>
            <td>{{ $item->tanggal_kembali ?? '-' }}</td>
            <td>
                <span class="badge {{ $item->status === 'dipinjam' ? 'bg-warning' : 'bg-success' }}">
                    {{ $item->status }}
                </span>
            </td>
            <td>
                <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center">Belum ada data peminjaman.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $peminjaman->links() }}
@endsection
