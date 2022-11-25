<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PmitraController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\StokController;
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

// Sistem Utility Route

// Data Master Route
Route::resource('/kategori',             KategoriController::class);
Route::resource('/pelanggan',            PelangganController::class);
Route::resource('/mitra',            MitraController::class);
Route::resource('/satuan',               SatuanController::class);
Route::resource('/barang',               BarangController::class);

// transaksi Route
Route::get('/trx_pembelian',                [App\Http\Controllers\PembelianController::class, 'index']);
Route::get('/get-data/{nama_barang}',   [App\Http\Controllers\PembelianController::class, 'getData']);
Route::resource('/trx_penjualanmitra',             PmitraController::class);
Route::resource('/trx_penjualan',           PenjualanController::class);
Route::get('/get-data/{nama_barang}',   [App\Http\Controllers\PenjualanController::class, 'getData']);
Route::resource('/user',                DataUserController::class);
Route::resource('/trx_point',               PointController::class);
Route::resource('/trx_hutang',              HutangController::class);
Route::resource('/trx_stok',                StokController::class);
// Cetak Route
Route::resource('/cetak/laporan',       LaporanController::class);
