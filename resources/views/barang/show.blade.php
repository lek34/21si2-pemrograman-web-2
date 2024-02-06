<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Barang') }}: {{ $barang->id }}
        </h2>
    </x-slot>

    <div class="py-12 overflow-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <x-link :href="route('admin.barang.index')">Back</x-link>

                <div class="border-blue-300 border p-2 flex flex-row justify-between">
                    <x-barang.card :barang="$barang" />
                    <div class="flex flex-row gap-x-2">
                        @can('update', $barang)
                        <x-link :href="route('admin.barang.edit', ['id' => $barang->id])">Edit</x-link>
                        @endcan

                        @can('delete', $barang)
                        <x-barang.delete :barang="$barang" />
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
