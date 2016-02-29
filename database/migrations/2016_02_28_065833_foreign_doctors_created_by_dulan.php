<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignDoctorsCreatedByDulan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreign_doctors',function (Blueprint $table){
            $table->increments('fdoc_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('dob');
            $table->string('gender');
            $table->string('language_1');
            $table->string('language_2');
            $table->string('language_3');
            $table->string('passport_number');
            $table->string('country');
            $table->string('contact_number');
            $table->string('email');
            $table->text('description');
            $table->string('place');
            $table->string('comming_date');
            $table->string('time');
            $table->double('charges');
            $table->integer('number_of_days');
            $table->integer('image');
            $table->string('username');
            $table->string('password');
            $table->dateTime('reg_date');
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
        Schema::drop('foreign_doctors');
    }
}
