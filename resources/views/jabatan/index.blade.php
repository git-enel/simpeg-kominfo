<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Jabatan</h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-6 bg-white shadow sm:rounded-lg">
        <form action="{{ route('jabatan.store') }}" method="POST" class="flex gap-4">
          @csrf
          <input type="text" name="nama_jabatan" placeholder="Nama Jabatan Baru" class="flex-1 rounded border-gray-300" required>
          <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        </form>
      </div>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class="max-w-7xl mx-auto space-y-6">
          <div class="flex justify-start">
            <form action="{{ route('jabatan.index') }}" method="GET" class="flex gap-2 w-full md:w-1/3">
              <input type="text" name="search" placeholder="Cari jabatan..." value="{{ request('search') }}"
                class="rounded border-gray-300 w-full shadow-sm focus:border-blue-500 focus:ring-blue-500">
              <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 shadow-sm transition">
                Cari
              </button>
              @if(request('search'))
              <a href="{{ route('jabatan.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">
                Reset
              </a>
              @endif
            </form>
          </div>

          <div class="mt-4">
            {{ $jabatans->appends(['search' => request('search')])->links() }}
          </div>
        </div>
        <table class="min-w-full border">
          <thead>
            <tr class="bg-gray-50 border-b">
              <th class="px-6 py-3 text-left">Nama Jabatan</th>
              <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($jabatans as $j)
            <tr class="border-b">
              <td class="px-6 py-4">{{ $j->nama_jabatan }}</td>
              <td class="px-6 py-4 text-center flex justify-center gap-2">
                <a href="{{ route('jabatan.edit', $j->id) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('jabatan.destroy', $j->id) }}" method="POST">
                  @csrf @method('DELETE')
                  <button class="text-red-600 hover:underline">Hapus</button>
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