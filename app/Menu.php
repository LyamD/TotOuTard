<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menus";

    public $timestamps = false;

    protected $fillable = [
        'nom', 'dateMenu' 
    ];

    function plats()
    {
        return $this->belongsToMany('App\Plat', 'menus_plats', 'menus_id', 'plats_id');
    }


}
