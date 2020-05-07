<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dataumum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('dataumums', function (Blueprint $table) {
            $table->increments('id_dataumum');
            $table->string('id_provinsi');
            $table->string('id_kabkota');
            $table->string('id_kec');
            $table->string('id_kel');
            $table->string('rt');

            $table->string('luassk');
            $table->string('luasverifikasi');
            $table->string('jumlahbangunan');
            $table->string('jumlahpenduduk');
            $table->string('jumlahkk');
           
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
        //
    }
}
