<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'admins';
    public $timestamps = true;

    protected $fillable = [

        'user_id',
        'first_name',
        'last_name',
        'type',
        'email',
        'reg_date',
        'create_at',
        'updated_at'
    ];
}
