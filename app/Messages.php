<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //
    protected $fillable = [
        'mID',
        'mFrom',
        'mTo',
        'mSubject',
        'mBody',
        'readStatus',
        'sent',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'messages';
}
