<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriePlat extends Model
{
    protected $table = "categoriesplat";

    public $timestamps = false;

    protected $fillable = [
        'nom'
    ];

    function plats()
    {
        return $this->hasMany('App\Plat', 'categories_plat_id');
    }

}
