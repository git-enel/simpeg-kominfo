<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Jabatan</h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white p-6 shadow sm:rounded-lg">
        <form action="{{ route('jabatan.store') }}" method="POST">
          @csrf
          <div class="mb-4">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="w-full rounded border-gray-300" required>
          </div>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
          <a href="{{ route('jabatan.index') }}" class="ml-2 text-gray-600">Batal</a>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>