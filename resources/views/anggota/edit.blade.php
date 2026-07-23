@extends('layouts.app')

@section('content')
<h3>Edit Anggota</h3>
<form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('anggota._form')
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
