<x-base-app>
    <div class="p-4 overflow-auto">
        <h1>Edit Barang</h1>
        <x-barang.form :barang="$barang" :action="route('barang.update', ['id' => $barang->id])" />
    </div>
</x-base-app>
