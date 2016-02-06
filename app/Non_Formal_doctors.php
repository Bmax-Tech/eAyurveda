<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Non_Formal_doctors extends Model
{
    protected $fillable = [
        'id',
        'doctor_id',
        'suggested_user',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'non_formal_docs';
}
