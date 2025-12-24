<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\UnitKerja;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $pegawais = Pegawai::with(['jabatan', 'unitKerja'])
            ->when($search, function ($query) use ($search) {
                $query->where('nama_lengkap', 'ILIKE', "%{$search}%")
                    ->orWhere('nip', 'ILIKE', "%{$search}%");
            })
            ->paginate(10);

        return view('pegawai.index', compact('pegawais'));
    }
    public function create()
    {
        $jabatans = Jabatan::all();
        $unitKerjas = UnitKerja::all();
        return view('pegawai.create', compact('jabatans', 'unitKerjas'));
    }
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus');
    }
    public function edit(Pegawai $pegawai)
    {
        $jabatans = Jabatan::all();
        $unitKerjas = UnitKerja::all();
        return view('pegawai.edit', compact('pegawai', 'jabatans', 'unitKerjas'));
    }
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nip' => 'required|unique:pegawais,nip,' . $pegawai->id,
            'unit_kerja_id' => 'required',
            'jabatan_id' => 'required',
            'status' => 'required',
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nip' => 'required|unique:pegawais,nip',
            'unit_kerja_id' => 'required|exists:unit_kerjas,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'status' => 'required',
        ]);

        Pegawai::create([
            'user_id' => Auth::id(),
            'nama_lengkap' => $request->nama_lengkap,
            'nip' => $request->nip,
            'unit_kerja_id' => $request->unit_kerja_id,
            'jabatan_id' => $request->jabatan_id,
            'status' => $request->status,
            'telepon' => $request->telepon ?? '-',
            'alamat' => $request->alamat ?? '-',
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Ditambah');
    }
}
