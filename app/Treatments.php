<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    protected $fillable = [
        'id',
        'doc_id',
        'treat_1',
        'treat_2',
        'treat_3',
        'treat_4',
        'treat_5',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'treatments';
}
