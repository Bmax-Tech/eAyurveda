<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Health_tips extends Model
{
    protected $primaryKey = 'hid';
    protected $table = 'health_tips';
    public $timestamps = true;

    protected $fillable = [

        'tip',
        'discription_1',
        'discription_2'
    ];


}
