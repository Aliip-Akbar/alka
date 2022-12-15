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
            $table->id();
            $table->string('kd_barang');
            $table->string('nama_barang')->nullable();
            $table->string('kategori')->nullable();
            $table->string('satuan_beli')->nullable();
            $table->double('harga_beli')->nullable();
            $table->string('satuan_jual')->nullable();
            $table->double('harga_normal')->nullable();
            $table->double('harga_mitra')->nullable();
            $table->double('harga_grosir')->nullable();
            $table->double('point')->nullable();
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
