<x-base-app>
    <div class="p-4 overflow-auto">
        <x-header>Detail Barang: {{ $barang->id }}</x-header>

        <x-link :href="route('admin.barang.index')">Back</x-link>

        <div class="border-blue-300 border p-2">
            <x-barang.card :barang="$barang" />
            <div class="flex flex-row gap-x-2">
                <x-link :href="route('admin.barang.edit', ['id' => $barang->id])">Edit</x-link>
                <x-barang.delete :barang="$barang" />
            </div>
        </div>
    </div>
</x-base-app>
