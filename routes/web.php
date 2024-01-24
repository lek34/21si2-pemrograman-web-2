<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(BarangController::class)->prefix('/barang')
                                          ->name('barang.')
                                          ->group(function() {
    Route::get('/', 'index')->name('index'); // list barang
    Route::get('/new', 'new'); // tampil form new barang
    Route::post('/', 'create'); // handle logic create barang
});
