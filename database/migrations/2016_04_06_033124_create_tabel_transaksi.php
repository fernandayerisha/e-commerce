<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_trasaksi');
            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('product');
            $table->integer('id_order')->unsigned();
            $table->foreign('id_order')->references('id_order')->on('orderr');
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
        Schema::drop('transaksi');
    }
}
