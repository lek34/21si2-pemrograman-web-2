<?php

namespace App\Http\Controllers;

// import CreateBarangRequest untuk digunakan
use App\Http\Requests\CreateBarangRequest;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Log;

class BarangController extends Controller
{
    // List Barang
    function index()
    {
        $barangs = Barang::all();

        return view('barang.index', ['barangs' => $barangs]);
    }

    // Form new barang
    function new()
    {
        return view('barang.new');
    }

    // Create new barang
    // Inject form request validation CreateBarangRequest ke method
    // create untuk digunakan di method ini
    function create(CreateBarangRequest $request)
    {
        // jalankan validation, jika validation data, laravel akan
        // menampilkan kembali form request terakhir
        // variable $errors akan diisikan dengan pesan error dari validation
        // Jika validasi berhasil, variable $b akan berisikan data request
        // yang sudah di-validasi dan di-normalize
        $b = $request->validated();

        // mass assign create with validation
        $barang = Barang::create(['nama' => $b['nama'], 'harga' => $b['harga']]);
        if (!$barang) {
            // abort dengan response HTTP 500 jika gagal membuat record barang
            abort(500);
        }

        // mass assign create without validation
        /*$barang = Barang::create([
            'nama' => $request->input('nama'),
            'harga' => (int)$request->input('harga')
        ]);*/

        // manually create without validation
        /*$barang = new Barang;
        $barang->nama = $request->input('nama');
        $barang->harga = (int)$request->input('harga');
        $barang->save();*/

        // return redirect('/barang');
        return to_route('barang.index');
    }
}
