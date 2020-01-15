<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "Menus";

    public $timestamps = false;

    protected $fillable = [
        'nom', 'dateMenu' 
    ];

    function plats()
    {
        return $this->belongsToMany('App\Menu', 'menus_plats', 'plats_id', 'menus_id');
    }


}
