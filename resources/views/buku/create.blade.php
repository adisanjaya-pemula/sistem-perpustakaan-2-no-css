@extends('layouts.app')

@section('content')
<h3>Tambah Buku</h3>
<form action="{{ route('buku.store') }}" method="POST">
    @csrf
    @include('buku._form')
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
