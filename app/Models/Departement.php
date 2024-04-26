<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    public function Employes()
    {
        return $this->hasMany('App\Models\Employe', 'Departement_id');
    }
    public function Stagaires()
    {
        return $this->hasMany('App\Models\Stagaire', 'Departement_id');
    }
    public function Demmandes()
    {
        return $this->hasMany('App\Models\Demmande', 'Departement_id');
    }
}
