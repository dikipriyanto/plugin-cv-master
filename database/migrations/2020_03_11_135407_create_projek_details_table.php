<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjekDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projek_details', function (Blueprint $table) {
            $table->bigInteger('id_tim')->unsigned();
            $table->bigInteger('id_projek')->unsigned();
          

            $table->foreign('id_tim')->references('id')->on('tims')->onDelete('CASCADE');
            $table->foreign('id_projek')->references('id')->on('projeks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projek_details');
    }
}
