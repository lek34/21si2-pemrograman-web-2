<div {{ $attributes->merge(['class' => 'flex flex-row gap-x-4']) }}>
    <div class="flex flex-col gap-x-2">
        <h1>{{ $barang->nama }}</h1>
        <h2 class="text-sm text-gray-700">{{ $barang->harga }}</h2>
    </div>
    <div class="flex flex-row gap-x-2">
        <a href="{{ route('barang.show', ['id' => $barang->id]) }}" class="text-blue-500 underline">Show</a>
        <a href="{{ route('barang.edit', ['id' => $barang->id]) }}" class="text-blue-500 underline">Edit</a>
        <a href="{{ route('barang.delete', ['id' => $barang->id]) }}" class="text-blue-500 underline">Delete</a>
    </div>
</div>
