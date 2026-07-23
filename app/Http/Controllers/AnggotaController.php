<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::latest()->paginate(10);
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'required|email|unique:anggota,email',
        ]);

        Anggota::create($request->all());
        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'required|email|unique:anggota,email,' . $anggota->id,
        ]);

        $anggota->update($request->all());
        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil dihapus.');
    }
}