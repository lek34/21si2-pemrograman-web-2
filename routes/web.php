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
    Route::get('/new', 'new')->name('new'); // tampil form new barang
    Route::post('/', 'create')->name('create'); // handle logic create barang
    Route::get('/{id}', 'show')->name('show'); // handle show barang detail
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
});
