<html>
    <body>
        <h1>Detail Barang: {{ $barang->id }}</h1>

        <a href="{{ route('barang.index') }}">Back</a>
        <div>
            <p>Nama: {{ $barang->nama }}</p>
            <p>Harga: {{ $barang->harga }}</p>
        </div>
        <div>
            <a href="{{ route('barang.edit', ['id' => $barang->id]) }}">Edit</a>
            <a href="{{ route('barang.delete', ['id' => $barang->id]) }}">Delete</a>
        </div>
    </body>
</html>
