<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foreign_doctors extends Model
{
    protected $primaryKey = 'fdoc_id';
    protected $table = 'foreign_doctors';
    public $timestamps = true;

    protected $fillable = [
        'fdoc_id',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'language_1',
        'language_2',
        'language_3',
        'passport_number',
        'country',
        'contact_number',
        'email',
        'description',
        'place',
        'comming_date',
        'time',
        'charges',
        'number_of_days',
        'image',
        'username',
        'password',
        'reg_date',
        'created_at',
        'updated_at'
    ];


}
