<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Stagaire;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use App\Models\Departement;
use Illuminate\Support\Facades\Hash;
use App\Models\Gender;
use Illuminate\Support\Facades\Mail;
use App\Mail\StagaireCreated;
use App\Models\Tache;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Notifications\CreateTache;
use App\Models\Meeting;
use Illuminate\Support\Facades\Notification;

class StagaireController extends Controller
{
    
    use UploadImageTrait;
    public function dashboard()
    {
        $user = auth('stagaire')->user();
        $meetings = Meeting::where('Stagaire_id', $user->id)
        ->whereRaw('start_at + INTERVAL duration SECOND > NOW()')
        ->get();
        $taches=$user->Taches;
    $tachess=$user->Taches->where('assignment','!=',null);
    if($taches->count()!=0){
        $pourcentage= intval(($tachess->count() / $taches->count()) * 100);
    }else{
        $pourcentage=0;
    }
        
        $taches = Tache::where('Stagaire_id', $user->id)->with('stagaire')->get();
        $project = Project::where('Stagaire_id', $user->id)
        ->with('Stagaires')
        ->latest() 
        ->first();
        $events = [];
        $tachess=$taches->where('assignment',null);

        foreach ($taches as $tache) {
            if($tache->assignment==null){
                $events[] = [
                    'title' => $tache->Title,
                    'start' => $tache->start, 
                    'end' => $tache->end,
                    'id' => $tache->id,
                ];
            }
        }

        return view('pages.Stagaire.dashboard', compact('events','project','tachess','meetings','pourcentage'));
    }
   /*  public function index_stagaire() dashboard
    {
        $user = Auth::user(); 
        if ($user) {
            return $user->FullName; 
        } else {
            return "Utilisateur non trouvé"; 
        }
    } */
    
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


    public function store(Request $request)
    {
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
        ],[
            'Name.required' => 'The name field is required.',
            'Name.string' => 'The name must be a string.',
            'Name.max' => 'The name may not be greater than 255 characters.',
            'Email.required' => 'The email field is required.',
            'Email.email' => 'Please enter a valid email address.',
            'Email.unique' => 'The email has already been taken.',
            'Address.required' => 'The address field is required.',
            'Address.string' => 'The address must be a string.',
            'Address.max' => 'The address may not be greater than 255 characters.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters.',
            'Specialization_id.required' => 'The specialization field is required.',
            'Gender_id.required' => 'The gender field is required.',
            'Date_debut.required' => 'The start date field is required.',
            'Date_debut.date' => 'Please enter a valid start date.',
            'Date_fin.required' => 'The end date field is required.',
            'Date_fin.date' => 'Please enter a valid end date.',
            'Telephone.required' => 'The telephone field is required.',
            'Telephone.max' => 'The telephone may not be greater than 10 characters.'
        ]);
    
        $stagaire = new Stagaire();
        $stagaire->telephone = $validatedData['Telephone'];
        $stagaire->FullName = $validatedData['Name'];
        $stagaire->email = $validatedData['Email'];
        $stagaire->Address = $validatedData['Address'];
        $stagaire->password = Hash::make($validatedData['password']); 
        $stagaire->Departement_id = $validatedData['Specialization_id'];
        $stagaire->Gender_id = $validatedData['Gender_id'];
        $stagaire->Date_debut = $validatedData['Date_debut'];
        $stagaire->Date_fin = $validatedData['Date_fin'];
        if ($request->hasFile('photo')) {
            $path = $this->uploadImage($request, 'stagaire');
            $stagaire->photo = $path;
        }
        $stagaire->save();
        Mail::to($stagaire->email)->send(new StagaireCreated($stagaire));
        return redirect()->route('Stagaire.index')->with('message', 'Stagiaire added successfully');
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
    $validatedData = $request->validate([
        'Name' => 'required|string|max:255',
        'Email' => 'required|email|unique:stagaires,email,' . $request->id,
        'Address' => 'required|string|max:255',
        'Specialization_id' => 'required',
        'Gender_id' => 'required',
        'Date_debut' => 'required|date',
        'Date_fin' => 'required|date',
        'Telephone'=>'required|max:10',
    ],[
        'Name.required' => 'The name field is required.',
        'Name.string' => 'The name must be a string.',
        'Name.max' => 'The name may not be greater than 255 characters.',
        'Email.required' => 'The email field is required.',
        'Email.email' => 'Please enter a valid email address.',
        'Email.unique' => 'The email has already been taken.',
        'Address.required' => 'The address field is required.',
        'Address.string' => 'The address must be a string.',
        'Address.max' => 'The address may not be greater than 255 characters.',
        'password.required' => 'The password field is required.',
        'password.string' => 'The password must be a string.',
        'password.min' => 'The password must be at least 8 characters.',
        'Specialization_id.required' => 'The specialization field is required.',
        'Gender_id.required' => 'The gender field is required.',
        'Date_debut.required' => 'The start date field is required.',
        'Date_debut.date' => 'Please enter a valid start date.',
        'Date_fin.required' => 'The end date field is required.',
        'Date_fin.date' => 'Please enter a valid end date.',
        'Telephone.required' => 'The telephone field is required.',
        'Telephone.max' => 'The telephone may not be greater than 10 characters.'
    ]);
    $stagaire=Stagaire::findOrFail($request->id);
  
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

    return redirect()->route('Stagaire.index')->with('message', 'Stagaire updated successfully');
}

    public function destroy(request $request)
    {
        
    Stagaire::findOrFail($request->id)->delete();
    return Redirect::route('Stagaire.index')->with([
        'message'=>'Stagaire deleted successfully'
    ]);;
    }
    public function certificat(){
        $user= auth('stagaire')->user();
        $testimonial = Testimonial::where('Stagaire_id', $user->id)
        ->with('Stagaire')
        ->latest() 
        ->first();
        return view('pages.Stagaire.certificat',compact('user','testimonial'));
       
    }
    public function download_certificat(){
        $user= auth('stagaire')->user();
        $pdf = Pdf::loadView('pages.Stagaire.downloadcertificat',compact('user'));
        return $pdf->download();
    }
}
