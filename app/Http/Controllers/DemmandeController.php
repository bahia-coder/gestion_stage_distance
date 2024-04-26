<?php

namespace App\Http\Controllers;

use App\Models\Demmande;
use App\Models\Departement;
use Illuminate\Support\Facades\Mail;
use App\Mail\StagaireCreated;
use App\Mail\refuseStagaire;
use App\Models\Stagaire;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Redirect;

class DemmandeController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Departements=Departement::all();
        
        $demmandes = Demmande::where('status', 'current')->get();

        // Passez les données des départements à la vue "welcome" en utilisant compact
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

        // Passez les données des départements à la vue "welcome" en utilisant compact
        return view('pages.Demmandes.index', compact('demmandes','Departements'));
    
    }
    public function liste_annuler(){
        $Departements=Departement::all();
        
        $demmandes = Demmande::where('status', 'annuler')->get();

        // Passez les données des départements à la vue "welcome" en utilisant compact
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|email|unique:demmandes',
            'Address' => 'required|string|max:255',
            'Specialization_id' => 'required',
            'Gender_id' => 'required',
            'Date_debut' => 'required|date',
            'Date_fin' => 'required|date',
            'Telephone'=>'required|max:10'
        ]);
    
        // Process the validated data and store the new demande
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
    
        // Rediriger l'utilisateur après avoir ajouté la demande
        return redirect()->route('in')->with('success', 'Demande added successfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demmande  $demmande
     * @return \Illuminate\Http\Response
     */
    public function show(Demmande $demmande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demmande  $demmande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demmande $demmande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demmande  $demmande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demmande $demmande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demmande  $demmande
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        
        $demmande = Demmande::findOrFail($request->id)->delete();
        
        return redirect()->route('Demmande.index');
    }
}
