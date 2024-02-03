<x-base-app>
    <div class="p-4 overflow-auto">
        <x-header>Edit Barang</x-header>
        <x-barang.form :barang="$barang" :action="route('barang.update', ['id' => $barang->id])" />
    </div>
</x-base-app>
