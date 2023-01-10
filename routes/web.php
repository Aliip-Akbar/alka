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
Route::get('/', [App\Http\Controllers\LayoutController::class, 'index'])->middleware('auth');
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
        Route::resource('penjualan', App\Http\Controllers\PenjualanPelangganController::class);
        Route::resource('stok', App\Http\Controllers\StokController::class);
        Route::resource('penjualanmitra', App\Http\Controllers\PmitraController::class);
        Route::resource('detailtrx', App\Http\Controllers\DetailTrxController::class);
        Route::resource('hutang', App\Http\Controllers\HutangController::class);
        Route::get('cetak/pembelian', 'App\Http\Controllers\LaporanController@cetak_pembelian');
        Route::get('cetak/penjualan_reguler', 'App\Http\Controllers\LaporanController@cetak_penjualan');
        Route::get('cetak/penjualan_mitra', 'App\Http\Controllers\LaporanController@cetak_mitra');
        Route::get('cetak/stok_barang', 'App\Http\Controllers\LaporanController@cetak_barang');
        Route::get('cetak/barang_masuk', 'App\Http\Controllers\LaporanController@cetak_masuk');
        Route::get('cetak/barang_keluar', 'App\Http\Controllers\LaporanController@cetak_keluar');
        Route::get('pembelian/{trx_id}', 'App\Http\Controllers\PembelianController@getInfo');
        Route::get('stok/get-data/{nama_barang}', 'App\Http\Controllers\PembelianController@getStok');
        Route::get('pembelian/get-data/{nama_barang}', 'App\Http\Controllers\PembelianController@getData');
        Route::resource('laporan', App\Http\Controllers\LaporanController::class);
        Route::resource('user', App\Http\Controllers\DataUserController::class);
        Route::resource('mitra', App\Http\Controllers\MitraController::class);
        Route::resource('menu', App\Http\Controllers\MenuController::class);
    });
    Route::group(['middleware' => ['CekUserLogin:2']],function () {
        Route::get('/chart-data', 'App\Http\Controllers\ChartController@getChartData');
        Route::get('/chart-tm', 'App\Http\Controllers\ChartController@getChartTm');
        Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
        Route::resource('barang', App\Http\Controllers\BarangController::class);
        Route::resource('satuan', App\Http\Controllers\SatuanController::class);
        Route::resource('kategori', App\Http\Controllers\KategoriController::class);
        Route::resource('produk', App\Http\Controllers\ProdukController::class);
        Route::resource('pembelian', App\Http\Controllers\PembelianController::class);
        Route::resource('penjualan', App\Http\Controllers\PenjualanPelangganController::class);
        Route::resource('stok', App\Http\Controllers\StokController::class);
        Route::resource('penjualanmitra', App\Http\Controllers\PmitraController::class);
        Route::resource('detailtrx', App\Http\Controllers\DetailTrxController::class);
        Route::resource('hutang', App\Http\Controllers\HutangController::class);
        Route::get('cetak/pembelian', 'App\Http\Controllers\LaporanController@cetak_pembelian');
        Route::get('cetak/penjualan_reguler', 'App\Http\Controllers\LaporanController@cetak_penjualan');
        Route::get('cetak/penjualan_mitra', 'App\Http\Controllers\LaporanController@cetak_mitra');
        Route::get('cetak/stok_barang', 'App\Http\Controllers\LaporanController@cetak_barang');
        Route::get('cetak/barang_masuk', 'App\Http\Controllers\LaporanController@cetak_masuk');
        Route::get('cetak/barang_keluar', 'App\Http\Controllers\LaporanController@cetak_keluar');
        Route::get('pembelian/{trx_id}', 'App\Http\Controllers\PembelianController@getInfo');
        Route::get('stok/get-data/{nama_barang}', 'App\Http\Controllers\PembelianController@getStok');
        Route::get('pembelian/get-data/{nama_barang}', 'App\Http\Controllers\PembelianController@getData');
        Route::resource('laporan', App\Http\Controllers\LaporanController::class);
        Route::resource('user', App\Http\Controllers\DataUserController::class);
        Route::resource('mitra', App\Http\Controllers\MitraController::class);
        Route::resource('menu', App\Http\Controllers\MenuController::class);
    });
    Route::group(['middleware' => ['CekUserLogin:3']],function () {
        Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
        Route::resource('barang', App\Http\Controllers\BarangController::class);
        Route::resource('satuan', App\Http\Controllers\SatuanController::class);
        Route::resource('kategori', App\Http\Controllers\KategoriController::class);
        Route::resource('produk', App\Http\Controllers\ProdukController::class);
        Route::resource('pembelian', App\Http\Controllers\PembelianController::class);
        Route::resource('penjualan', App\Http\Controllers\PenjualanPelangganController::class);
        Route::resource('stok', App\Http\Controllers\StokController::class);
        Route::resource('penjualanmitra', App\Http\Controllers\PmitraController::class);
        Route::resource('detailtrx', App\Http\Controllers\DetailTrxController::class);
        Route::resource('hutang', App\Http\Controllers\HutangController::class);
        Route::get('cetak/pembelian', 'App\Http\Controllers\LaporanController@cetak_pembelian');
        Route::get('cetak/penjualan_reguler', 'App\Http\Controllers\LaporanController@cetak_penjualan');
        Route::get('cetak/penjualan_mitra', 'App\Http\Controllers\LaporanController@cetak_mitra');
        Route::get('cetak/stok_barang', 'App\Http\Controllers\LaporanController@cetak_barang');
        Route::get('cetak/barang_masuk', 'App\Http\Controllers\LaporanController@cetak_masuk');
        Route::get('cetak/barang_keluar', 'App\Http\Controllers\LaporanController@cetak_keluar');
        Route::get('pembelian/{trx_id}', 'App\Http\Controllers\PembelianController@getInfo');
        Route::get('stok/get-data/{nama_barang}', 'App\Http\Controllers\PembelianController@getStok');
        Route::get('pembelian/get-data/{nama_barang}', 'App\Http\Controllers\PembelianController@getData');
        Route::resource('laporan', App\Http\Controllers\LaporanController::class);
        Route::resource('user', App\Http\Controllers\DataUserController::class);
        Route::resource('mitra', App\Http\Controllers\MitraController::class);
        Route::resource('menu', App\Http\Controllers\MenuController::class);
    });
});
