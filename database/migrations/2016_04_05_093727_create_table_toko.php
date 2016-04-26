<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableToko extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('toko', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nama_toko');
          $table->string('slogan');
          $table->string('deskripsi');
          $table->string('alamat');
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
        Schema::drop('toko');
    }
}
