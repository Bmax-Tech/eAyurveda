<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = [
        'id',
        'doc_id',
        'spec_1',
        'spec_2',
        'spec_3',
        'spec_4',
        'spec_5',
        'spec_6',
        'spec_7',
        'spec_8',
        'spec_9',
        'spec_10',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'specialization';
}
