<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthTip extends Model
{
    protected $fillable = [
        'hid',
        'tip',
        'discription_1',
        'discription_2',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'health_tips';
}
