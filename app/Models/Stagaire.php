<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Stagaire  extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'email', // Nom de la colonne contenant l'adresse e-mail
        // Autres colonnes remplissables de votre table Stagiaire
    ];
}
