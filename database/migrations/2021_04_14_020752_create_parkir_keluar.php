<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkirKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkir_keluar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plat_nomor');
            $table->string('jenis_kendaraan');
            $table->string('jam_keluar');
            $table->string('tgl_keluar');
            $table->integer('total');
            $table->integer('bayar');
            $table->integer('kembalian');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExist('parkir_keluar');
    }
}
