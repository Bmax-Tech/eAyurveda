<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUnregisterDoctorDulan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_formal_docs',function (Blueprint $table){
            $table->increments('id');
            $table->string('doctor_id');
            $table->string('suggested_user');
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
        Schema::drop('unregiser_doctors_table_dulan');
    }
}
