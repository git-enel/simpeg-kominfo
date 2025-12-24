<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('pegawai.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="w-full rounded border-gray-300" required>
                        </div>
                        <div>
                            <label>NIP</label>
                            <input type="text" name="nip" class="w-full rounded border-gray-300" required>
                        </div>
                        <div>
                            <label>Jabatan</label>
                            <select name="jabatan_id" class="w-full rounded border-gray-300">
                                @foreach($jabatans as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Unit Kerja</label>
                            <select name="unit_kerja_id" class="w-full rounded border-gray-300">
                                @foreach($unitKerjas as $u)
                                    <option value="{{ $u->id }}">{{ $u->nama_unit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Status</label>
                            <select name="status" class="w-full rounded border-gray-300">
                                <option value="Pegawai Tetap">Pegawai Tetap</option>
                                <option value="Kontrak">Kontrak</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>