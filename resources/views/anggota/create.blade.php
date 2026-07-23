@extends('layouts.app')

@section('content')
<h3>Tambah Anggota</h3>
<form action="{{ route('anggota.store') }}" method="POST">
    @csrf
    @include('anggota._form')
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
