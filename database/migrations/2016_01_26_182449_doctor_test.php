<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DoctorTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formal_docs',function (Blueprint $table){
            $table->increments('id');
			$table->string('doctor_id');
            $table->string('ayurvedic_id');
			$table->date('ayurvedic_reg_date');
            $table->string('registered_field');
			$table->string('approved_by');
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
        Schema::drop('formal_docs');
    }
}
