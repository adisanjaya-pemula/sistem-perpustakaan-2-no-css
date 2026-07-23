@extends('layouts.app')

@section('content')
<h3>Edit Buku</h3>
<form action="{{ route('buku.update', $buku->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('buku._form')
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
