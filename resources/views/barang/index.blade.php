<x-base-app>
<div class="p-4 overflow-auto">
    <x-header>List Barang</x-header>
    <x-link :href="route('barang.new')">New Barang</x-link>
    <ol class="list-disc list-outside">
    @foreach ($barangs as $barang)
        <li>
            <x-barang.card :barang="$barang" />
            <div class="flex flex-row gap-x-2">
                <x-link :href="route('barang.show', ['id' => $barang->id])">Show</x-link>
                <x-link :href="route('barang.edit', ['id' => $barang->id])">Edit</x-link>
                <x-link :href="route('barang.delete', ['id' => $barang->id])">Delete</x-link>
            </div>
        </li>
    @endforeach
    </ol>
</div>
</x-base-app>
