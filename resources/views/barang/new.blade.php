<div>
    <h1>New Barang</h1>
    <form method="post" action="/barang">
        @csrf
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}"/>
        </div>
        <div>
            <label>Harga</label>
            <input type="text" name="harga" value="{{ old('harga') }}" />
        </div>
        <div>
            <input type="submit" value="Simpan" />
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
