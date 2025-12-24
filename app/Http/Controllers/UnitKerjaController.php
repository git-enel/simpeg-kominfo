<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitKerja;

class UnitKerjaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $units = \App\Models\UnitKerja::when($search, function ($query) use ($search) {
            $query->where('nama_unit', 'ILIKE', "%{$search}%");
        })
            ->paginate(10);

        return view('unit_kerja.index', compact('units'));
    }
    public function create()
    {
        return view('unit_kerja.create');
    }
    public function store(Request $request)
    {
        $request->validate(['nama_unit' => 'required']);
        \App\Models\UnitKerja::create(['nama_unit' => $request->nama_unit]);
        return redirect()->route('unit-kerja.index')->with('success', 'Unit Berhasil Ditambah');
    }
    public function edit(UnitKerja $unitKerja)
    {
        return view('unit_kerja.edit', compact('unitKerja'));
    }
    public function update(Request $request, UnitKerja $unitKerja)
    {
        $request->validate([
            'nama_unit' => 'required'
        ]);

        $unitKerja->update([
            'nama_unit' => $request->nama_unit
        ]);

        return redirect()->route('unit-kerja.index')->with('success', 'Unit kerja berhasil diubah');
    }
    public function destroy(UnitKerja $unitKerja)
    {
        $unitKerja->delete();
        return redirect()->route('unit-kerja.index')->with('success', 'Unit berhasil dihapus');
    }
}
