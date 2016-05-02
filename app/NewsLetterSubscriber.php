<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLetterSubscriber extends Model
{
    //
    protected $fillable = [
        'nsId',
        'nsEmail',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'newsletter_subscriber';
}
