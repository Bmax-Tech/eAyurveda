<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Therapies extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'image_path',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'therapies';
}
