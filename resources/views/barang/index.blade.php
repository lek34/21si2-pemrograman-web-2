<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Barang') }}
        </h2>
    </x-slot>

    <div class="py-12 overflow-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- check policy create barang -->
                @can('create', App\Models\Barang::class)
                <x-link :href="route('admin.barang.new')">New Barang</x-link>
                @endcan

                <div class="flex flex-col gap-y-2">
                @foreach ($barangs as $barang)
                    <div class="border-blue-300 border p-2 flex flex-row justify-between">
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
        </div>
    </div>
</x-app-layout>
