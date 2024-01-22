<?php

use App\Http\Controllers\Hello;
use Illuminate\Support\Facades\Route;

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

Route::get('/pertemuan2/hello', [Hello::class, 'index']);

Route::controller(Hello::class)->prefix('/pertemuan2')->group(function() {
    Route::get('/greet', 'greet');
    Route::post('/greet', 'post_greet');
});
