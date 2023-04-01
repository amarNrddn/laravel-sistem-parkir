<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkirMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkir_masuk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plat_nomor');
            $table->string('jenis_kendaraan');
            $table->string('jam_masuk');
            $table->string('tgl_masuk');
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
        Schema::dropIfExists('parkir_masuk');
    }
}
