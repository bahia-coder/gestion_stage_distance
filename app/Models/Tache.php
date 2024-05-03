<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    public function stagaire()
    {
        return $this->belongsTo(Stagaire::class, 'Stagaire_id');
    }
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'Project_id');
    }
}
