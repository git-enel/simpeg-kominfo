<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Unit Kerja</h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white p-6 shadow sm:rounded-lg">
        <form action="{{ route('unit-kerja.store') }}" method="POST">
          @csrf
          <div class="mb-4">
            <label>Nama Unit Kerja</label>
            <input type="text" name="nama_unit" class="w-full rounded border-gray-300" required>
          </div>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
          <a href="{{ route('unit-kerja.index') }}" class="ml-2 text-gray-600">Batal</a>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>