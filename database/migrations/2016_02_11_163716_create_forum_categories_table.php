<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forumCategory', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('catID');
            $table->text('catName');
            $table->text('catDescription');
            $table->text('imageURL');
            $table->timestamps();
        });

        Schema::create('forumQuestion', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('qID');
            $table->text('qFrom');
            $table->text('qBody');
            $table->text('qSubject');
            $table->boolean('qFlagged');
            $table->integer('qCategory');
            $table->integer('upvotes');
            $table->integer('downvotes');
            $table->timestamps();
        });

        Schema::create('forumanswer', function (Blueprint $table) {
            $table->engine = "InnoDB";
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

        Schema::create('forumSubscribe', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->text('user');
            $table->integer('qID');
            $table->timestamps();
        });

        Schema::create('answerVote', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->text('user');
            $table->integer('answerID');
            $table->integer('vote');
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
        Schema::drop('answerVote');
        Schema::drop('forumSubscribe');
        Schema::drop('forumanswer');
        Schema::drop('forumQuestion');
        Schema::drop('forumCategory');
    }
}
