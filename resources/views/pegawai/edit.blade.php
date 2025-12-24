<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <h2 class="mb-4 font-bold text-lg">Edit Data Pegawai</h2>

        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="grid grid-cols-1 gap-4">
            <div>
              <label>Nama Lengkap</label>
              <input type="text" name="nama_lengkap" value="{{ $pegawai->nama_lengkap }}" class="w-full rounded border-gray-300" required>
            </div>
            <div>
              <label>NIP</label>
              <input type="text" name="nip" value="{{ $pegawai->nip }}" class="w-full rounded border-gray-300" required>
            </div>
            <div>
              <label>Jabatan</label>
              <select name="jabatan_id" class="w-full rounded border-gray-300">
                @foreach($jabatans as $j)
                <option value="{{ $j->id }}" {{ $pegawai->jabatan_id == $j->id ? 'selected' : '' }}>{{ $j->nama_jabatan }}</option>
                @endforeach
              </select>
            </div>
            <div>
              <label>Unit Kerja</label>
              <select name="unit_kerja_id" class="w-full rounded border-gray-300">
                @foreach($unitKerjas as $u)
                <option value="{{ $u->id }}" {{ $pegawai->unit_kerja_id == $u->id ? 'selected' : '' }}>{{ $u->nama_unit }}</option>
                @endforeach
              </select>
            </div>
            <div>
              <label>Status</label>
              <select name="status" class="w-full rounded border-gray-300">
                <option value="Pegawai Tetap" {{ $pegawai->status == 'Pegawai Tetap' ? 'selected' : '' }}>Pegawai Tetap</option>
                <option value="Kontrak" {{ $pegawai->status == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
              </select>
            </div>
          </div>
          <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Perbarui Data</button>
            <a href="{{ route('pegawai.index') }}" class="ml-2 text-gray-600">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>