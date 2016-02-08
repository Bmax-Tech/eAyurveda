<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reg_Doctor extends Model
{
    protected $primaryKey = 'id';
	protected $table = 'regiser_doctors_table_dulan';
	public $timestamps = true;
	
	protected $fillable = [
		'register_id',
		'first_name',
		'register_field',
		'register_date',
		'dob',
		'gender',
		'nic',
		'address',
		'contact_number',
		'email',
		'current_working_place',
		'working_experience',
		'medical_procedure',
		'treatment_period',
		'requirment',
		'charges',
		'type_of_medicine',
		'treatment_times',
		'carrier_period',
		'doctor_experince',
		'special_meditate',
		'created_at',
		'updated_at'
	];
}
