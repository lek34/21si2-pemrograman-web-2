<x-base-app>
    <x-header>Detail Barang: {{ $barang->id }}</x-header>

    <a href="{{ route('barang.index') }}">Back</a>
    <x-barang.card :barang="$barang" />
    <div>
        <a href="{{ route('barang.edit', ['id' => $barang->id]) }}">Edit</a>
        <a href="{{ route('barang.delete', ['id' => $barang->id]) }}">Delete</a>
    </div>
</x-base-app>
