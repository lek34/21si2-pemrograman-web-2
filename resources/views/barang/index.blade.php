<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Barang') }}
        </h2>
    </x-slot>

    <div class="py-12 overflow-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col gap-y-2">
                <!-- check policy create barang -->
                @can('create', App\Models\Barang::class)
                <form method="get" action="{{ route('admin.barang.new') }}">
                    <x-primary-button>New Barang</x-primary-button>
                </form>
                @endcan

                <div class="flex flex-col gap-y-2">
                @foreach ($barangs as $barang)
                    <div class="border-blue-300 border p-2 flex flex-row justify-between">
                        <x-barang.card :barang="$barang" />
                        <div class="flex flex-row gap-x-2">
                            <!-- check policy show barang -->
                            @can('show', $barang)
                            <form method="get" action="{{ route('admin.barang.show', ['id' => $barang->id]) }}">
                                <x-secondary-button type="submit">Show</x-secondary-button>
                            </form>
                            @endcan

                            <!-- check policy update Barang -->
                            @can('update', $barang)
                            <form method="get" action="{{ route('admin.barang.edit', ['id' => $barang->id]) }}">
                                <x-secondary-button type="submit">Edit</x-secondary-button>
                            </form>
                            @endcan

                            <!-- check policy delete barang -->
                            @can('delete', $barang)
                            <div class="text-sm">
                            <x-barang.delete :barang="$barang" />
                            </div>
                            @endcan
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="mt-2">
            {{ $barangs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
