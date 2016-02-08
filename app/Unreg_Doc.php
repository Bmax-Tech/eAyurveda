<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unreg_Doc extends Model
{
     protected $primaryKey = 'id';
	protected $table = 'unregiser_doctors_table_dulan';
	public $timestamps = true;
	
	protected $fillable=[
		'first_name',
		'last_name',
		'dob',
		'gender',
		'address',
		'nic',
		'contact_number',
		'email',
		'medical_procedure',
		'treatment_period',
		'requirment',
		'charges',
		'type_of_medicine',
		'treatment_times',
		'carrier_period',
		'doctor_experience',
		'special_meditate',
		'comment1',
		'comment2',
		'comment3',
		'created_at',
		'updated_at'
	];
}
