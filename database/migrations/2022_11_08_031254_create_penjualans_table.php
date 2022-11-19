<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('jumlah_barang');
            $table->string('satuan_barang');
            $table->integer('harga_barang');
            $table->integer('subtotal');
            $table->string('nama_pembeli');
            $table->string('metode_pembayaran');
            $table->integer('total_harga');
            $table->integer('diskon');
            $table->integer('ongkir');
            $table->integer('total_belanja');
            $table->integer('pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualans');
    }
};
