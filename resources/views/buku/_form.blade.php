<div class="mb-3">
    <label class="form-label">Kode Buku</label>
    <input type="text" name="kode_buku" class="form-control" value="{{ old('kode_buku', $buku->kode_buku ?? '') }}">
    @error('kode_buku') <small class="text-danger">{{ $message }}</small> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" name="judul" class="form-control" value="{{ old('judul', $buku->judul ?? '') }}">
    @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Penulis</label>
    <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $buku->penulis ?? '') }}">
    @error('penulis') <small class="text-danger">{{ $message }}</small> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Penerbit</label>
    <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit', $buku->penerbit ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Tahun Terbit</label>
    <input type="number" name="tahun_terbit" class="form-control" value="{{ old('tahun_terbit', $buku->tahun_terbit ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Stok</label>
    <input type="number" name="stok" class="form-control" value="{{ old('stok', $buku->stok ?? 0) }}">
</div>
