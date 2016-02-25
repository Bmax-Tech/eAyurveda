<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class ForumQuestion extends Model
{
    //
    protected $fillable = [
        'qID',
        'qFrom',
        'qSubject',
        'qBody',
        'qFlagged',
        'qCategory',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'forumQuestion';
}
