<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $anggota->nama ?? '') }}">
    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control">{{ old('alamat', $anggota->alamat ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">No. Telepon</label>
    <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp', $anggota->no_telp ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $anggota->email ?? '') }}">
    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
</div>
