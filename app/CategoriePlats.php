<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriePlats extends Model
{
    protected $table = "CategoriesPlats";

    public $timestamps = false;

    protected $fillable = [
        'nom'
    ];

    function plats()
    {
        return $this->hasMany('App\Plats');
    }

}
