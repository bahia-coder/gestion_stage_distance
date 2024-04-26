<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Stagaire;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use App\Models\Departement;
use Illuminate\Support\Facades\Hash;
use App\Models\Gender;
use Illuminate\Support\Facades\Mail;
use App\Mail\StagaireCreated;
use Illuminate\Support\Facades\Redirect;

class StagaireController extends Controller
{
    
    use UploadImageTrait;
    public function index_stagaire()
{
    $user = Auth::user(); // Récupérer l'utilisateur authentifié
    if ($user) {
        return $user->FullName; // Accéder à la propriété FullName de l'utilisateur
    } else {
        return "Utilisateur non trouvé"; // Gérer le cas où l'utilisateur n'est pas authentifié
    }
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $Departements = Departement::with(['stagaires'])->get();
    $list_Departements = Departement::all();
    $stagaires = Stagaire::all();
        return view('pages.Stagaire.index', compact('stagaires','Departements','list_Departements'));
    }

    

    public function create()
    {
        $departements= Departement::all();
        $genders = Gender::all();
        return view('pages.Stagaire.create',compact('departements','genders'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|email|unique:stagaires',
            'Address' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'Specialization_id' => 'required',
            'Gender_id' => 'required',
            'Date_debut' => 'required|date',
            'Date_fin' => 'required|date',
            'Telephone'=>'required|max:10'
        ]);
    
        // Process the validated data and store the new stagiaire
        $stagaire = new Stagaire();
        $stagaire->telephone = $validatedData['Telephone'];
        $stagaire->FullName = $validatedData['Name'];
        $stagaire->email = $validatedData['Email'];
        $stagaire->Address = $validatedData['Address'];
        $stagaire->password = Hash::make($validatedData['password']); // Hash the password
        $stagaire->Departement_id = $validatedData['Specialization_id'];
        $stagaire->Gender_id = $validatedData['Gender_id'];
        $stagaire->Date_debut = $validatedData['Date_debut'];
        $stagaire->Date_fin = $validatedData['Date_fin'];
        if ($request->hasFile('photo')) {
            $path = $this->uploadImage($request, 'stagaire');
            $stagaire->photo = $path;
        }
        $stagaire->save();
    
        // Send email notification to the stagiaire
        Mail::to($stagaire->email)->send(new StagaireCreated($stagaire));
    
        // Redirect the user after storing the stagiaire
        return redirect()->route('Stagaire.index')->with('success', 'Stagiaire added successfully');
    }
      


    public function show(Employe $employe)
    {
        //
    }

    
    public function edit(Int $id)
    {
        
        $departements= Departement::all();
        $genders = Gender::all();
        $stagaire = Stagaire::findOrFail($id);
    return view('pages.Stagaire.edit',compact('stagaire','departements','genders'));
    }

public function update(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'Name' => 'required|string|max:255',
        'Email' => 'required|email|unique:stagaires,email,' . $request->id,
        'Address' => 'required|string|max:255',
        'Specialization_id' => 'required',
        'Gender_id' => 'required',
        'Date_debut' => 'required|date',
        'Date_fin' => 'required|date',
        'Telephone'=>'required|max:10',
    ]);
    $stagaire=Stagaire::findOrFail($request->id);
    // Update the employee record
    $stagaire->FullName = $validatedData['Name'];
    $stagaire->email = $validatedData['Email'];
    $stagaire->Address = $validatedData['Address'];
    
    $stagaire->telephone = $validatedData['Telephone'];
    
    $stagaire->Departement_id = $validatedData['Specialization_id'];
    $stagaire->Gender_id = $validatedData['Gender_id'];
    $stagaire->Date_debut = $validatedData['Date_debut'];
    $stagaire->Date_fin = $validatedData['Date_fin'];

    if ($request->hasFile('photo')) {
        $path = $this->uploadImage($request, 'stagaires');
        $stagaire->photo = $path;
    }

    $stagaire->save();

    return redirect()->route('Stagaire.index')->with('success', 'Stagaire updated successfully');
}

    public function destroy(request $request)
    {
        
    Stagaire::findOrFail($request->id)->delete();
    return Redirect::route('Stagaire.index')->with([
        'success'=>'Stagaire deleted successfully'
    ]);;
    }
}
