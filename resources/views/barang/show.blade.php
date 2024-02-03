<x-base-app>
    <x-header>Detail Barang: {{ $barang->id }}</x-header>

    <x-link :href="route('barang.index')">Back</x-link>
    <x-barang.card :barang="$barang" />
    <div>
        <x-link :href="route('barang.edit', ['id' => $barang->id])">Edit</x-link>
        <x-link :href="route('barang.delete', ['id' => $barang->id])">Delete</x-link>
    </div>
</x-base-app>
