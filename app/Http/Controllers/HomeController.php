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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $demmandes = Demmande::where('status', 'current')->get();
        $demmandes_annuler = Demmande::where('status', 'annuler')->get();
        $demmandes_confirmed = Demmande::where('status', 'confirmed')->get();
        // Récupération des départements avec leurs stagiaires
        $Departements = Departement::with(['stagaires'])->get();
    
        // Récupération de tous les départements
        $list_Departements = Departement::all();
    
        // Récupération de tous les stagiaires
        $stagaires = Stagaire::all();
    
        // Récupération des départements avec leurs employés
        $Departements_emp = Departement::with(['employes'])->get();
    
        // Récupération de tous les employés
        $employes = Employe::all();
    
        // Passer les données à la vue
        return view('welcome', compact('Departements', 'list_Departements', 'stagaires', 'Departements_emp', 'employes','demmandes_confirmed','demmandes_annuler','demmandes'));
    }
   
    
    
}
