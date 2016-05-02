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
            $table->integer('qCategory');
            $table->integer('upvotes')->default(0);
            $table->integer('downvotes')->default(0);
            $table->integer('numViews')->default(0);
            $table->boolean('approvedStatus')->default(false);
            $table->timestamp('postedOn')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });

        Schema::create('forumanswer', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('aid');
            $table->integer('qID');
            $table->text('aFrom');
            $table->text('aBody');
            $table->integer('upVotes')->default(0);
            $table->integer('downVotes')->default(0);
            $table->boolean('bestAnswer')->default(false);
            $table->boolean('approvedStatus')->default(false);
            $table->timestamp('postedOn')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });

        Schema::create('forumSubscribe', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->text('user');
            $table->integer('qID');
        });

        Schema::create('forumAnswerVotes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->text('user');
            $table->integer('aID');
            $table->integer('value');
        });

        Schema::create('forumAnswerFlags', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->text('user');
            $table->integer('aID');
        });

        Schema::create('forumQuestionFlags', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->text('user');
            $table->integer('qID');
        });

        Schema::create('forumUser', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->text('user');
            $table->text('userType')->default("Member");
            $table->boolean('verified')->default(false);
            $table->integer('numQuestions');
            $table->integer('numAnswers');
            $table->integer('numBestAnswer');
            $table->integer('reputationPoints');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forumUser');
        Schema::drop('forumQuestionFlags');
        Schema::drop('forumAnswerFlags');
        Schema::drop('forumAnswerVotes');
        Schema::drop('answerVote');
        Schema::drop('forumSubscribe');
        Schema::drop('forumanswer');
        Schema::drop('forumQuestion');
        Schema::drop('forumCategory');
    }
}
