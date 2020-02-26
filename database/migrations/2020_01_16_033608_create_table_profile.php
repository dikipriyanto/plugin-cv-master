<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::table('profile', function (Blueprint $table) {
    //         //
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::table('profile', function (Blueprint $table) {
    //         //
    //     });
    // }

    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->engine = 'InnoDB';
 
            $table->increments('id');
            $table->string('nama',115)->nullable();
            $table->string('email',115)->nullable();
            $table->string('phone',25)->nullable();
            $table->text('alamat')->nullable();
        });
    }
}
