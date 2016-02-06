<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonFormalDocsTableByBuwaneka extends Migration
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
            $table->integer('doctor_id');
            $table->integer('suggested_user');
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
        Schema::drop('non_formal_docs');
    }
}
