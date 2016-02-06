<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'doctor_id',
        'rating',
        'description',
        'posted_date_time',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'comments';
}
