<?php

namespace App\Http\Controllers;

use App\Models\Demmande;
use App\Models\Departement;
use Illuminate\Support\Facades\Mail;
use App\Mail\StagaireCreated;
use Illuminate\Validation\ValidationException;
use App\Mail\refuseStagaire;
use App\Models\Stagaire;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Redirect;

class DemmandeController extends Controller
{
    use UploadImageTrait;
    
    public function index()
    {
        $Departements=Departement::all();
        
        $demmandes = Demmande::where('status', 'current')->get();

        return view('pages.Demmandes.index', compact('demmandes','Departements'));
    
    }
    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Demmande::whereIn('id', $delete_all_id)->Delete();
        return redirect()->route('Demmande.index');
    }
    public function confirm(int $id){
        $stagaire = new Stagaire();
    
        $demmande = Demmande::findOrFail($id);
        $demmande->status = 'confirmed';
        $demmande->save();
        $stagaire->telephone =  $demmande->telephone;
    $stagaire->FullName = $demmande->FullName;
    $stagaire->email = $demmande->email;
    $stagaire->Address = $demmande->Address;
    $stagaire->password =  $demmande->password;
    $stagaire->Departement_id = $demmande->Departement_id;
    $stagaire->Gender_id = $demmande->Gender_id;
    $stagaire->Date_debut = $demmande->Date_debut ;
    $stagaire->Date_fin = $demmande->Date_fin;
    $stagaire->photo=$demmande->photo;
    $stagaire->save();
    $employe=$stagaire;
    $employe->password = ($stagaire->FullName . '12345');
    Mail::to($stagaire->email)->send(new StagaireCreated($employe));
        return redirect()->route('Demmande.index');
    }
    public function annuler(int $id){
        $demmande = Demmande::findOrFail($id);
        $demmande->status = 'annuler';
        $demmande->save();
        $employe=$demmande;
        $employe->password = ($demmande->FullName . '12345');
        Mail::to($demmande->email)->send(new refuseStagaire($employe));
        
        return redirect()->route('Demmande.index');
    }
    public function liste_confirmer(){
        $Departements=Departement::all();
        
        $demmandes = Demmande::where('status', 'confirmed')->get();

        return view('pages.Demmandes.index', compact('demmandes','Departements'));
    
    }
    public function liste_annuler(){
        $Departements=Departement::all();
        
        $demmandes = Demmande::where('status', 'annuler')->get();

  
        return view('pages.Demmandes.index', compact('demmandes','Departements'));
    
    }
    public function Filter_Departements(Request $request)
    {
        
        
        $Departements=Departement::all();
        $demmandes = Demmande::select('*')->where('Departement_id','=',$request->Departement_id)->get();
        return view('pages.Demmandes.index',compact('Departements'))->withDetails($demmandes);

    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'Name' => 'required|string|max:255',
                'Email' => 'required|email|unique:demmandes',
                'Address' => 'required|string|max:255',
                'Specialization_id' => 'required',
                'Gender_id' => 'required',
                'Date_debut' => 'required|date|after_or_equal:today',
    'Date_fin' => 'required|date|after:Date_debut',
                'Telephone' => 'required|max:10'
            ], [
                'Name.required' => 'The name field is required.',
                'Name.string' => 'The name field must be a string.',
                'Name.max' => 'The name field must not exceed :max characters.',
                'Email.required' => 'The email field is required.',
                'Email.email' => 'Please enter a valid email address.',
                'Email.unique' => 'This email address is already in use.',
                'Date_debut.required' => 'The start date field is required.',
                'Date_debut.date' => 'The start date must be a valid date.',
                'Date_debut.after_or_equal' => 'The start date must be today or in the future.',
                'Date_fin.required' => 'The end date field is required.',
                'Date_fin.date' => 'The end date must be a valid date.',
                'Date_fin.after' => 'The end date must be after the start date.',
                'Telephone.required' => 'The telephone field is required.',
            ]);
            
            
       
            $demande = new Demmande();
            $demande->Telephone = $validatedData['Telephone'];
            $demande->FullName = $validatedData['Name'];
            $demande->email = $validatedData['Email'];
            $demande->Address = $validatedData['Address'];
            $demande->password = bcrypt($validatedData['Name'] . '12345');
            $demande->Departement_id = $validatedData['Specialization_id'];
            $demande->Gender_id = $validatedData['Gender_id'];
            $demande->Date_debut = $validatedData['Date_debut'];
            $demande->Date_fin = $validatedData['Date_fin'];
            
            if ($request->hasFile('photo')) {
                $path = $this->uploadImage($request, 'demande');
                $demande->photo = $path;
            }
        
            if ($request->hasFile('cv')) {
                $path = $this->uploadCv($request, 'demande');
                $demande->cv = $path;
            }
        
            $demande->save();
            return redirect()->route('acceuile')->with('message', 'Demande envoyée avec succès');
       
        } catch (ValidationException $e) {
            return redirect()->route('acceuile')->with('error', 'Invalid data provided');
        }
    }
   
    public function show(Demmande $demmande)
    {
        //
    }

    
    public function edit(Demmande $demmande)
    {
        //
    }

    
    public function update(Request $request, Demmande $demmande)
    {
        //
    }

    
    public function destroy(request $request)
    {
        
        $demmande = Demmande::findOrFail($request->id)->delete();
        
        return redirect()->route('Demmande.index');
    }
}
