<div>
    <h1>List Barang</h1>
    <a href="/barang/new">New Barang</a>
    <ol>
    @foreach ($barangs as $barang)
        <li>
            {{ $barang->nama }} - {{ $barang->harga }}
            <a href="{{ route('barang.show', ['id' => $barang->id]) }}">Show</a>
            <a href="{{ route('barang.edit', ['id' => $barang->id]) }}">Edit</a>
            <a href="{{ route('barang.delete', ['id' => $barang->id]) }}">Delete</a>
        </li>
    @endforeach
    </ol>
</div>
