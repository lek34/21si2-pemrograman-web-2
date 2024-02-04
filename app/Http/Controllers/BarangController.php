<?php

namespace App\Http\Controllers;

// import CreateBarangRequest untuk digunakan
use App\Http\Requests\CreateBarangRequest;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
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
        return view('barang.new', ['barang' => new Barang]);
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
        return to_route('admin.barang.index');
    }

    function show(int $id)
    {
        // findOrFail -> cari berdasarkan primary key, abort(404) jika
        // tidak ditemukan
        $barang = Barang::findOrFail($id);

        return view('barang.show', ['barang' => $barang]);
    }

    function edit(int $id)
    {
        $barang = Barang::findOrFail($id);

        return view('barang.edit', ['barang' => $barang]);
    }

    function update(CreateBarangRequest $request, int $id)
    {
        $validated_request = $request->validated();

        // DB::transaction menjalankan operasi transaction database
        // fungsi ini menerima sebuah callable/anonymous function/closure
        // yang dijalankan di dalam transaksi.
        // keyword use digunakan untuk menginject variable dari luar untuk
        // digunakan di dalam anonymous function
        // Apabila terjadi exception di dalam transaction, transaksi database
        // akan di rollback, sebaliknya jika tidak terjadi exception
        // transaksi akan otomatis di commit ke database
        DB::transaction(function() use($validated_request, $id) {
            $barang = Barang::where('id', $id)?->lockForUpdate();
            if (!$barang) {
                abort(404);
            }

            $updated = $barang->update(['nama' => $validated_request['nama'], 'harga' => $validated_request['harga']]);
            if (!$updated) {
                abort(500);
            }
        });

        return to_route('admin.barang.index');
    }

    function delete(int $id)
    {
        DB::transaction(function() use($id) {
            $barang = Barang::findOrFail($id);

            $deleted = $barang->delete();
            if (!$deleted) {
                abort(500);
            }
        });

        return to_route('admin.barang.index');
    }
}
