<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelMenjual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menjual', function (Blueprint $table) {
            $table->increments('id_menjual');
            $table->integer('id_seller')->unsigned();
            $table->foreign('id_seller')->references('id_seller')->on('sellers');
            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')->references('id_product')->on('product');
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
        Schema::drop('menjual');
    }
}
