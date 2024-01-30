<x-base-app>
<div class="p-4 overflow-auto">
    <x-header>List Barang</x-header>
    <a href="/barang/new" class="text-blue-500 underline">New Barang</a>
    <ol class="list-disc list-outside">
    @foreach ($barangs as $barang)
        <li>
            <x-barang.card :barang="$barang" />
        </li>
    @endforeach
    </ol>
</div>
</x-base-app>
