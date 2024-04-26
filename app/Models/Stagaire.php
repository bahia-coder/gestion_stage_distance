<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Stagaire  extends Authenticatable
{
   
    use HasApiTokens, HasFactory, Notifiable;
    public function Departements()
    {
        return $this->belongsTo('App\Models\Departement','Departement_id');
    }

    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }
    public function projects()
    {
        return $this->belongsTo('App\Models\Project', 'Stagaire_id');
    }
   
   
    public function Taches()
    {
        return $this->hasMany('App\Models\Tache', 'Stagaire_id');
    }
    public function Meetings()
    {
        return $this->hasMany('App\Models\Meeting', 'Stagaire_id');
    }
}
