<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Barang') }}: {{ $barang->id }}
        </h2>
    </x-slot>

    <div class="py-12 overflow-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col gap-y-2">
                <div class="flex flex-row justify-between">
                    <form method="get" action="{{ route('admin.barang.index') }}">
                        <x-secondary-button type="submit">Back</x-secondary-button>
                    </form>

                    <div class="flex flex-row gap-x-2">
                        @can('update', $barang)
                        <form method="get" action="{{ route('admin.barang.edit', ['id' => $barang->id]) }}">
                            <x-secondary-button type="submit">Edit</x-secondary-button>
                        </form>
                        @endcan

                        @can('delete', $barang)
                        <div class="text-sm">
                            <x-barang.delete :barang="$barang" />
                        </div>
                        @endcan
                    </div>
                </div>

                <div class="border-blue-300 border p-2">
                    <x-barang.card :barang="$barang" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
