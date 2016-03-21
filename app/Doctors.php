<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'doc_type',
        'first_name',
        'last_name',
        'gender',
        'dob',
        'nic',
        'address_1',
        'address_2',
        'city',
        'district',
        'contact_number',
        'email',
        'description',
        'rating',
        'tot_stars',
        'rated_tot_users',
        'reg_date',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
    protected $table = 'doctors';
}
