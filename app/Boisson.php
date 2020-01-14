<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boisson extends Model
{
    protected $table = "Boissons";

    public $timestamps = false;

    protected $fillable = [
        'nom', 'prix', 'description', 'contenance', 'present_carte', 'contient_alcool'
    ];

}
