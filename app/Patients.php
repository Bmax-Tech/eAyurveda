<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'patients';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'dob',
        'nic',
        'contact_number',
        'email',
        'reg_date',
        'created_at',
        'updated_at'
    ];


}
