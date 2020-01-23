<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiche extends Model
{
    protected $table = "affiches";

    public $timestamps = false;

    protected $fillable = [
        'nom', 'description', 'plats_id'
    ];

    function plat()
    {
        return $this->belongsTo('App\Plat', 'plats_id');
    }

}
