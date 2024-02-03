<form method="{{ $method ?? 'post' }}" action="{{ $action }}" class="grid grid-cols-1 gap-y-2">
    @csrf
    <div class="grid grid-cols-2">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="{{ old('nama') ?? $barang->nama }}" class="ring-gray-500 focus:ring-blue-500 p-2" />
        <x-error error-field="nama" />
    </div>
    <div class="grid grid-cols-2">
        <label>Harga</label>
        <input type="text" name="harga" value="{{ old('harga') ?? $barang->harga }}" class="ring-gray-500 focus:ring-blue-500 p-2" />
        <x-error error-field="harga" />
    </div>
    <div>
        <input type="submit" value="Simpan" class="border-blue-500 border bg-blue-500 text-white font-semibold p-2" />
        <a href="{{ route('barang.index') }}"><input type="button" value="Batal" class="border-blue-500 border text-blue-500 font-semibold p-2" /></a>
    </div>
    <x-error error-field="_base" />
</form>
