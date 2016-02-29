<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featured_doc extends Model
{
    protected $primaryKey = 'fid';
    protected $table = 'featured_doc';
    public $timestamps = true;

    protected $fillable = [
        'did',
        'create_at',
        'updated_at'
    ];
}
