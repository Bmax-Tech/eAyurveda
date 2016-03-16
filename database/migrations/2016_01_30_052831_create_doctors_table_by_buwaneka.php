<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTableByBuwaneka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors',function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('doc_type'); // This Can be 'FORMAL' OR 'NON_FORMAL'
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('dob');
            $table->string('nic');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('city');
            $table->string('district');
            $table->string('contact_number');
            $table->string('email');
            $table->text('description');
            $table->integer('rating');
            $table->integer('tot_stars');
            $table->integer('rated_tot_users');
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
        Schema::drop('doctors');
    }
}
