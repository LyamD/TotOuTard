<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table = "photos";

    public $timestamps = false;

    protected $fillable = [
        'image', 'description' 
    ];


}
