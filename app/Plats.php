<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plats extends Model
{
    protected $table = "Plats";

    public $timestamps = false;

    protected $fillable = [
        'nom', 'prix', 'image', 'commentaire', 'contient_porc', 'present_carte'
    ];

}
