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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('id');
            $table->string('kd_barang');
            $table->string('nama_barang');
            $table->string('kategori');
            $table->string('satuan_beli');
            $table->double('harga_beli');
            $table->string('satuan_jual');
            $table->double('harga_normal');
            $table->double('harga_mitra');
            $table->double('harga_grosir');
            $table->double('stok');
            $table->double('point');
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
        Schema::dropIfExists('barangs');
    }
};
