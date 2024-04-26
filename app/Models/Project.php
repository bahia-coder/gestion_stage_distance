<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [ 'nom', 'Departement_id', 'Stagaire_id', 'Employe_id', 'Date_Expire'];

    use HasFactory;

    public function Stagaires()
    {
        return $this->belongsTo('App\Models\Stagaire', 'Stagaire_id');
    }

    public function Employes()
    {
        return $this->belongsTo('App\Models\Employe', 'Employe_id');
    }
    public function Taches()
    {
        return $this->hasMany('App\Models\Tache', 'Project_id');
    }

    public function Departements()
    {
        return $this->belongsTo('App\Models\Departement', 'Departement_id');
    }
}
