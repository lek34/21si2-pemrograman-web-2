<x-base-app>
    <div class="p-4 overflow-auto">
        <x-header>New Barang</x-header>
        <x-barang.form :barang="$barang" :action="route('admin.barang.create')" />
    </div>
</x-base-app>
