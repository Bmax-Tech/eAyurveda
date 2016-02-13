<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forumanswer', function (Blueprint $table) {
            $table->increments('aid');
            $table->integer('qID');
            $table->text('aFrom');
            $table->text('aSubject');
            $table->text('aBody');
            $table->boolean('aFlagged');
            $table->integer('upVotes');
            $table->integer('downVotes');
            $table->boolean('bestAnswer');
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
        Schema::drop('forumanswer');
    }
}
