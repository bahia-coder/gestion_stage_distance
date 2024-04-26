<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    public $fillable= ['integration','Stagaire_id','created_by','meeting_id','topic','start_at','duration','password','start_url','join_url'];

    public function stagaire()
    {
        return $this->belongsTo('App\Models\Stagaire', 'Stagaire_id');
    }
}
