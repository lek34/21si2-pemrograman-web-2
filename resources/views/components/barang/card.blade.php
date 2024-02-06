<div {{ $attributes->merge(['class' => 'flex flex-row gap-x-4']) }}>
    <div class="flex flex-col gap-x-2">
        <h1 class="text-gray-800 dark:text-gray-200">{{ $barang->nama }}</h1>
        <p class="text-sm text-gray-700 dark:text-gray-100">{{ $barang->harga }}</p>
    </div>
</div>
