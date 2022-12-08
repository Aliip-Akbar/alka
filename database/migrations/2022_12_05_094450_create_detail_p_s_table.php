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
        Schema::create('detail_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('trx_id')->unique();
            $table->string('nama')->nullable();
            $table->string('j_transaksi');
            $table->string('total');
            $table->double('diskon');
            $table->double('biaya_tambahan')->nullable();
            $table->string('grand_total');
            $table->string('keterangan')->nullable();
            $table->date('tgl_transaksi')->nullable();
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
        Schema::dropIfExists('detail_p_s');
    }
};
