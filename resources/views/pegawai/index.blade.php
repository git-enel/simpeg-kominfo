<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Pegawai</h2>
      <a href="{{ route('pegawai.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Pegawai</a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('pegawai.index') }}" method="GET" class="mb-4 flex gap-2">
          <input type="text" name="search" placeholder="Cari nama atau NIP..." value="{{ request('search') }}" class="rounded border-gray-300 w-full md:w-1/3">
          <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Cari</button>
        </form>
        <table class="min-w-full border">
          <thead>
            <tr class="bg-gray-100 border-b">
              <th class="px-4 py-2 text-left">Nama</th>
              <th class="px-4 py-2 text-left">NIP</th>
              <th class="px-4 py-2 text-left">Jabatan</th>
              <th class="px-4 py-2 text-left">Unit Kerja</th>
              <th class="px-4 py-2 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pegawais as $p)
            <tr class="border-b">
              <td class="px-4 py-2">{{ $p->nama_lengkap }}</td>
              <td class="px-4 py-2">{{ $p->nip }}</td>
              <td class="px-4 py-2">{{ $p->jabatan->nama_jabatan }}</td>
              <td class="px-4 py-2">{{ $p->unitKerja->nama_unit }}</td>
              <td class="px-4 py-2 text-center flex justify-center gap-2">
                <a href="{{ route('pegawai.edit', $p->id) }}" class="text-blue-500 hover:underline">Edit</a>

                <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app-layout>