<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "Plats";

    protected $fillable = [
        'horaire', 'nbDePersonnes'
    ];

    function etat()
    {
        return $this->belongsTo('App\Etat', 'etat_id');
    }

    function client()
    {
        return $this->belongsTo('App\CategoriePlat', 'categories_plat_id');
    }

}
