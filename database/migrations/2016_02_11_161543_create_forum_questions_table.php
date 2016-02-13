<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forumQuestion', function (Blueprint $table) {
            $table->increments('qID');
            $table->text('qFrom');
            $table->text('qBody');
            $table->boolean('qFlagged');
            $table->text('qCategory');
            $table->integer('upvotes');
            $table->integer('downvotes');
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
        Schema::drop('forumquestion');
    }
}
