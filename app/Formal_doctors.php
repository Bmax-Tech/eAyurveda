<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formal_doctors extends Model
{
    protected $fillable = [
        'id',
        'doctor_id',
        'ayurvedic_id',
        'ayurvedic_reg_date',
        'registered_field',
        'approved_by',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'formal_docs';
}
