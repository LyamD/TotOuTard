<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    protected $table = "plats";

    public $timestamps = false;

    protected $fillable = [
        'nom', 'prix', 'image', 'commentaire', 'contient_porc', 'present_carte', 'categories_plat_id'
    ];

    function categorie()
    {
        return $this->belongsTo('App\CategoriePlat', 'categories_plat_id');
    }

    function affiche()
    {
        return $this->hasMany('App\Affiche', 'plats_id');
    }

    function menus()
    {
        return $this->belongsToMany('App\Menu', 'menus_plats', 'plats_id', 'menus_id');
    }

}
