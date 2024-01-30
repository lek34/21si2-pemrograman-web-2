<x-base-app>
<div class="p-4 overflow-auto">
    <x-header>New Barang</x-header>
    <form method="post" action="{{ route('barang.create') }}" class="grid grid-cols-1 gap-y-2">
        @csrf
        <div class="grid grid-cols-2">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="ring-gray-500 focus:ring-blue-500 p-2"/>
        </div>
        <div class="grid grid-cols-2">
            <label>Harga</label>
            <input type="text" name="harga" value="{{ old('harga') }}" class="ring-gray-500 focus:ring-blue-500 p-2" />
        </div>
        <div>
            <input type="submit" value="Simpan" class="border-blue-500 border bg-blue-500 text-white font-semibold p-2"/>
            <a href="{{ route('barang.index') }}"><input type="button" value="Batal" class="border-blue-500 border text-blue-500 font-semibold p-2" /></a>
        </div>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
</x-base-app>
