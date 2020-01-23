<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boisson extends Model
{
    protected $table = "boissons";

    public $timestamps = false;

    protected $fillable = [
        'nom', 'prix', 'description', 'contenance', 'present_carte', 'contient_alcool'
    ];

}
