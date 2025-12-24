<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white p-6 shadow sm:rounded-lg">
        <h2 class="mb-4 font-bold">Edit Jabatan</h2>
        <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
          @csrf @method('PUT')
          <input type="text" name="nama_jabatan" value="{{ $jabatan->nama_jabatan }}" class="w-full rounded border-gray-300 mb-4">
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>