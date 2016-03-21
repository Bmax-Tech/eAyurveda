<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumAnswer extends Model
{
    //
    protected $fillable = [
        'aID',
        'qID',
        'aFrom',
        'aSubject',
        'aBody',
        'aFlagged',
        'upVotes',
        'downVotes',
        'bestAnswer',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'forumAnswer';
}
