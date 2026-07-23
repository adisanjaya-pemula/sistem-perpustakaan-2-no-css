@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Anggota</h3>
    <a href="{{ route('anggota.create') }}" class="btn btn-primary">+ Tambah Anggota</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr><th>No</th><th>Nama</th><th>Alamat</th><th>No. Telp</th><th>Email</th><th width="150">Aksi</th></tr>
    </thead>
    <tbody>
        @forelse ($anggota as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->no_telp }}</td>
            <td>{{ $item->email }}</td>
            <td>
                <a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">Belum ada data anggota.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $anggota->links() }}
@endsection
