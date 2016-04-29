<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileViews extends Model
{
    protected $fillable = [
        'id',
        'doctor_id',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'profile_view_hits';
}
