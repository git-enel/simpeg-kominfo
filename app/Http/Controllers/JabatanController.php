<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $jabatans = \App\Models\Jabatan::when($search, function ($query) use ($search) {
            $query->where('nama_jabatan', 'ILIKE', "%{$search}%");
        })
            ->paginate(10);

        return view('jabatan.index', compact('jabatans'));
    }
    public function create()
    {
        return view('jabatan.create');
    }
    public function store(Request $request)
    {
        $request->validate(['nama_jabatan' => 'required']);
        \App\Models\Jabatan::create(['nama_jabatan' => $request->nama_jabatan]);
        return redirect()->route('jabatan.index')->with('success', 'Jabatan Berhasil Ditambah');
    }
    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }
    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate(['nama_jabatan' => 'required']);
        $jabatan->update($request->all());
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diubah');
    }
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus');
    }
}
