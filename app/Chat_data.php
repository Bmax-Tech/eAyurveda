<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat_data extends Model
{
    protected $fillable = [
        'id',
        'sender_id',
        'receiver_id',
        'message',
        'posted_date_time',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'chat_data';
}
