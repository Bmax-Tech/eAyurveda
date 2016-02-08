<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegisterDoctorsTableDulan extends Migration
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
			$table->string('user_id');
            $table->string('doc_type');
            $table->string('first_name');
            $table->date('last_name');
            $table->date('gender');
            $table->string('dob');
			$table->string('nic');
            $table->string('address_1');
			$table->string('address_2');
			$table->string('city');
            $table->string('contact_number');
            $table->string('description');
            $table->string('rating');
            $table->string('rated_tot_users');
			//$table->string('profile_image');
            $table->date('reg_date');
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
