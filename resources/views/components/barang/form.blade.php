<form method="{{ $method ?? 'post' }}" action="{{ $action }}" class="grid grid-cols-1 gap-y-2">
    @csrf
    <div class="grid grid-cols-2 text-gray-800 dark:text-gray-200">
        <x-input-label for="nama">Nama</x-input-label>
        <x-text-input name="nama" value="{{ old('nama') ?? $barang->nama }}" />
        <x-input-error :messages="$errors->get('nama')" />
    </div>
    <div class="grid grid-cols-2 text-gray-800 dark:text-gray-200">
        <x-input-label for="harga">Harga</x-input-label>
        <x-text-input name="harga" value="{{ old('harga') ?? $barang->harga }}" />
        <x-input-error :messages="$errors->get('harga')" />
    </div>
    <div class="text-gray-800 dark:text-gray-200">
        <x-primary-button>Simpan</x-primary-button>
        <a href="{{ url()->previous() }}"><x-secondary-button>Batal</x-secondary-button></a>
    </div>
    <x-input-error :messages="$errors->get('_base')" />
</form>
