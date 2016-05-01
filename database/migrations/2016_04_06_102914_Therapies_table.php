<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TherapiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapies',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('discription');
            $table->string('image_path');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('therapies');
    }
}
