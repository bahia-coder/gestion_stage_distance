<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employe extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function Departements()
    {
        return $this->belongsTo('App\Models\Departement','Departement_id');
    }
    public function Projects()
    {
        return $this->hasMany('App\Models\Project','Employe_id');
    }

    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }
}
