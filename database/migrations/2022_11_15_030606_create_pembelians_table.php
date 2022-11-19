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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->date('exp_date');
            $table->string('jumlah');
            $table->string('satuan');
            $table->string('harga_beli');
            $table->string('subtotal');
            $table->string('tgl_pembayaran');
            $table->string('keterangan');
            $table->string('total');
            $table->string('ongkir');
            $table->string('diskon');
            $table->string('pajak');
            $table->string('grand_total');
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
        Schema::dropIfExists('pembelians');
    }
};
