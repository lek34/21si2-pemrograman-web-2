<x-base-app>
<div class="p-4 overflow-auto">
    <x-header>List Barang</x-header>
    <a href="/barang/new" class="text-blue-500 underline">New Barang</a>
    <ol class="list-disc list-outside">
    @foreach ($barangs as $barang)
        <li>
            <x-barang.card :barang="$barang" />
            <div class="flex flex-row gap-x-2">
                <a href="{{ route('barang.show', ['id' => $barang->id]) }}" class="text-blue-500 underline">Show</a>
                <a href="{{ route('barang.edit', ['id' => $barang->id]) }}" class="text-blue-500 underline">Edit</a>
                <a href="{{ route('barang.delete', ['id' => $barang->id]) }}" class="text-blue-500 underline">Delete</a>
            </div>
        </li>
    @endforeach
    </ol>
</div>
</x-base-app>
