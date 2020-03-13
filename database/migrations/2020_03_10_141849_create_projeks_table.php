<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projeks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_input');
            $table->string('nama_projek');
            $table->string('instansi');
            $table->string('proposal');
            $table->string('total_biaya');
            $table->date('tanggal_pengerjaan');
            $table->date('tanggal_selesai');
            $table->string('nama_penerima_projek');
            $table->string('penanggung_jawab');
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
        Schema::dropIfExists('projeks');
    }
}
