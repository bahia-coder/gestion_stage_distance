<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demmande extends Model
{
    use HasFactory;
    public function Departements()
    {
        return $this->belongsTo('App\Models\Departement','Departement_id');
    }

  
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }
}
