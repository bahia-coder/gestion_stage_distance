<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    protected $fillable = [
        'access_token',
            'refresh_token',// Ajoutez ici les autres champs que vous souhaitez autoriser pour l'attribution de masse
    ];
}
