<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login_admin extends Model
{
     protected $primaryKey = 'id';
	protected $table = 'login_admin';
	public $timestamps = true;
	
	protected $fillable = [
		'username',
		'password',
		'created_at',
		'updated_at'
	];
}
