<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forumCategory extends Model
{
    //
    protected $fillable = [
        'catName',
        'catDescription',
        'imageURL'
    ];

    public $timestamps = false;
    protected $table = 'forumCategory';
}
