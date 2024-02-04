<x-base-app>
<div class="p-4 overflow-auto">
    <x-header>List Barang</x-header>

    <!-- check policy create barang -->
    @can('create', App\Models\Barang::class)
    <x-link :href="route('admin.barang.new')">New Barang</x-link>
    @endcan

    <div class="flex flex-col gap-y-2">
    @foreach ($barangs as $barang)
        <div class="border-blue-300 border p-2">
            <x-barang.card :barang="$barang" />
            <div class="flex flex-row gap-x-2">
                <!-- check policy show barang -->
                @can('show', $barang)
                <x-link :href="route('admin.barang.show', ['id' => $barang->id])">Show</x-link>
                @endcan

                <!-- check policy update Barang -->
                @can('update', $barang)
                <x-link :href="route('admin.barang.edit', ['id' => $barang->id])">Edit</x-link>
                @endcan

                <!-- check policy delete barang -->
                @can('delete', $barang)
                <x-barang.delete :barang="$barang" />
                @endcan
            </div>
        </div>
    @endforeach
    </div>
</div>
</x-base-app>
