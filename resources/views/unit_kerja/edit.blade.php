<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Edit Unit Kerja
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('unit-kerja.update', $unitKerja->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-4">
            <label for="nama_unit" class="block text-sm font-medium text-gray-700">Nama Unit Kerja</label>
            <input type="text" name="nama_unit" id="nama_unit" value="{{ $unitKerja->nama_unit }}"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
          </div>

          <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
              Simpan Perubahan
            </button>
            <a href="{{ route('unit-kerja.index') }}" class="text-gray-600 hover:underline">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>