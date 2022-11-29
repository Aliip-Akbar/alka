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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->string('id');
            $table->string('kd_trx');
            $table->string('nama_barang');
            $table->double('jumlah');
            $table->double('harga_beli');
            $table->double('subtotal');
            $table->date('tgl_pembayaran');
            $table->double('pembayaran');
            $table->string('keterangan');
            $table->double('total');
            $table->double('ongkir');
            $table->double('diskon');
            $table->double('pajak');
            $table->double('grand_total');
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
        Schema::dropIfExists('transaksis');
    }
};
