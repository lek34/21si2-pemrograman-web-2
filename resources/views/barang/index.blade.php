<div>
    <h1>List Barang</h1>
    <a href="/barang/new">New Barang</a>
    <ol>
    @foreach ($barangs as $barang)
        <li>{{ $barang->nama }} - {{ $barang->harga }}</li>
    @endforeach
    </ol>
</div>
