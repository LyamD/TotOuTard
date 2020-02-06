<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "reservations";

    protected $fillable = [
        'horaire', 'nbDePersonnes', 'information', 'etat'
    ];

    public function client() {
        return $this->belongsTo('App\Client', 'client_id');
    }

}
