<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    protected $table = "Plats";

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
        return $this->belongToMany('App\Menu', 'menus_plats', 'menus_id', 'plats_id');
    }

}
