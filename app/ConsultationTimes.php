<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultationTimes extends Model
{
    protected $fillable = [
        'id',
        'doc_id',
        'time_1',
        'time_2',
        'time_3',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'consultation_times';
}
