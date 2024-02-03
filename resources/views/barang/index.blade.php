<x-base-app>
<div class="p-4 overflow-auto">
    <x-header>List Barang</x-header>
    <x-link :href="route('barang.new')">New Barang</x-link>
    <div class="flex flex-col gap-y-2">
    @foreach ($barangs as $barang)
        <div class="border-blue-300 border p-2">
            <x-barang.card :barang="$barang" />
            <div class="flex flex-row gap-x-2">
                <x-link :href="route('barang.show', ['id' => $barang->id])">Show</x-link>
                <x-link :href="route('barang.edit', ['id' => $barang->id])">Edit</x-link>
                <x-barang.delete :barang="$barang" />
            </div>
        </div>
    @endforeach
    </div>
</div>
</x-base-app>
