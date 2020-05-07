<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pembobotanawal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembobotanawals', function (Blueprint $table) {
            $table->increments('id_pembobotanawal');
            $table->string('tahun');
            $table->string('penghasilan');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('aset');
            $table->string('luas_lantai');
            $table->string('jenis_lantai');
            $table->string('jenis_dinding');
            $table->string('sumber_penerangan');
            $table->string('sumber_air');
            $table->string('fasil_bab');
            
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
