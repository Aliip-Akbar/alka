<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\LayoutController::class, 'index'])->middleware('auth');
Route::get('/home', [App\Http\Controllers\LayoutController::class, 'index'])->middleware('auth');
// Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');

Route::controller(App\Http\Controllers\LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses')->name('proses');
    Route::get('logout', 'logout')->name('logout');
});

Route::group(['middleware'=>['auth']],function () {
    Route::group(['middleware' => ['CekUserLogin:1']],function () {
        Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
        Route::resource('barang', App\Http\Controllers\BarangController::class);
        Route::resource('satuan', App\Http\Controllers\SatuanController::class);
        Route::resource('kategori', App\Http\Controllers\KategoriController::class);
        Route::resource('produk', App\Http\Controllers\ProdukController::class);
        Route::resource('pembelian', App\Http\Controllers\PembelianController::class);
        Route::resource('detailtrx', App\Http\Controllers\DetailTrxController::class);
        Route::get('pembelian/get-data/{nama_barang}', 'App\Http\Controllers\PembelianController@getData');
        Route::resource('laporan', App\Http\Controllers\LaporanController::class);
        Route::resource('user', App\Http\Controllers\DataUserController::class);
        Route::resource('mitra', App\Http\Controllers\MitraController::class);
    });
    Route::group(['middleware' => ['CekUserLogin:2']],function () {
        Route::resource('Kasir', App\Http\Controllers\KasirController::class);
        Route::resource('penjualan', App\Http\Controllers\PenjualanController::class);
    });
});
