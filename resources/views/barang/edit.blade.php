<div>
    <h1>Edit Barang</h1>
    <form method="post" action="{{ route('barang.update', [ 'id' => $barang->id ]) }}">
        @csrf
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama') ?? $barang->nama }}"/>
        </div>
        <div>
            <label>Harga</label>
            <input type="text" name="harga" value="{{ old('harga') ?? $barang->harga }}" />
        </div>
        <div>
            <input type="submit" value="Simpan" />
            <a href="{{ route('barang.index') }}"><input type="button" value="Batal" /></a>
        </div>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
