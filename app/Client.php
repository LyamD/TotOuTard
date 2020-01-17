<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "Clients";

    protected $fillable = [
        'nom', 'prenom', 'email', 'numero'
    ];

    function reservations()
    {
        return $this->hasMany('App\Reservation', 'client_id');
    }
}
