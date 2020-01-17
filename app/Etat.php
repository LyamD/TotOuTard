<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    protected $table = "Etats";

    public $timestamps = false;

    protected $fillable = [
        'nom'
    ];

    function reservations()
    {
        return $this->hasMany('App\Reservation', 'etat_id');
    }

}
