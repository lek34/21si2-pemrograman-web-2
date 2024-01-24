<?php

namespace App\Http\Controllers;

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
    function create(Request $request)
    {
        // validation
        // variable $b berisikan data yang sudah valid
        // jika validation gagal, method validate akan response redirect ke halaman sebelumnya
        $b = $request->validate([
            'nama' => 'required|string|min:3|max:50',
            'harga' => 'required|integer|min:0|max:1000000000'
        ]);

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
        return redirect(to_route('barang.index'));
    }
}
