<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiche extends Model
{
    protected $table = "Affiches";

    public $timestamps = false;

    protected $fillable = [
        'nom', 'description'
    ];

    function categorie()
    {
        return $this->belongTo('App\Plat', 'plats_id');
    }

}
