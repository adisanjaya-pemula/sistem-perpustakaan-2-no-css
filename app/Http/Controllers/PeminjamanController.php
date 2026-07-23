<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['buku', 'anggota'])->latest()->paginate(10);
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $buku = Buku::where('stok', '>', 0)->get();
        $anggota = Anggota::all();
        return view('peminjaman.create', compact('buku', 'anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'anggota_id' => 'required|exists:anggota,id',
            'tanggal_pinjam' => 'required|date',
        ]);

        $buku = Buku::findOrFail($request->buku_id);
        if ($buku->stok < 1) {
            return back()->with('error', 'Stok buku habis, tidak bisa dipinjam.');
        }

        DB::transaction(function () use ($request, $buku) {
            Peminjaman::create([
                'buku_id' => $request->buku_id,
                'anggota_id' => $request->anggota_id,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'status' => 'dipinjam',
            ]);
            $buku->decrement('stok');
        });

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dicatat.');
    }

    public function edit(Peminjaman $peminjaman)
    {
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('peminjaman.edit', compact('peminjaman', 'buku', 'anggota'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'tanggal_kembali' => 'nullable|date',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        $statusSebelumnya = $peminjaman->status;
        $peminjaman->update($request->only('tanggal_kembali', 'status'));
        if ($statusSebelumnya === 'dipinjam' && $request->status === 'dikembalikan') {
            $peminjaman->buku()->increment('stok');
        }

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}