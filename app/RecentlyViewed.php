<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentlyViewed extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'views',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'recently_viewed';
}
