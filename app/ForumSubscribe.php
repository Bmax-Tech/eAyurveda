<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumSubscribe extends Model
{
    //
    protected $fillable = [
        'user',
        'qID',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'forumSubscribe';
}
