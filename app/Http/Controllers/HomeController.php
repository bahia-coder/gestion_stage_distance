<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Demmande;
use App\Models\Employe;
use App\Models\Setting;
use App\Models\Stagaire;
class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $demmandes = Demmande::where('status', 'current')->get();
        $demmandes_annuler = Demmande::where('status', 'annuler')->get();
        $demmandes_confirmed = Demmande::where('status', 'confirmed')->get();
        $Departements = Departement::with(['stagaires'])->get();
    
        $list_Departements = Departement::all();
    
        $stagaires = Stagaire::all();
    
        $Departements_emp = Departement::with(['employes'])->get();
    
        $employes = Employe::all();
    
        return view('welcome', compact('Departements', 'list_Departements', 'stagaires', 'Departements_emp', 'employes','demmandes_confirmed','demmandes_annuler','demmandes'));
    }
   
    
    
}
