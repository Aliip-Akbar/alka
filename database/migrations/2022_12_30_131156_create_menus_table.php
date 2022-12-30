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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('username', 100)->nullable();
            $table->enum('menu_1', ['active', 'not-active'])->nullable();
            $table->enum('menu_2', ['active', 'not-active'])->nullable();
            $table->enum('menu_3', ['active', 'not-active'])->nullable();
            $table->enum('menu_4', ['active', 'not-active'])->nullable();
            $table->enum('menu_5', ['active', 'not-active'])->nullable();
            $table->enum('menu_6', ['active', 'not-active'])->nullable();
            $table->enum('menu_7', ['active', 'not-active'])->nullable();
            $table->enum('menu_8', ['active', 'not-active'])->nullable();
            $table->enum('menu_9', ['active', 'not-active'])->nullable();
            $table->enum('menu_10', ['active', 'not-active'])->nullable();
            $table->enum('menu_11', ['active', 'not-active'])->nullable();
            $table->enum('menu_12', ['active', 'not-active'])->nullable();
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
        Schema::dropIfExists('menus');
    }
};
