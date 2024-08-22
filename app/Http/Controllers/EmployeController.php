<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeeCreated;
use Illuminate\Support\Facades\Hash;
use App\Traits\UploadImageTrait;
use App\Models\Departement;
use App\Models\Project;
use App\Models\Gender;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    use UploadImageTrait;
   

    public function index()
    {
    $Departements = Departement::with(['employes'])->get();
    $list_Departements = Departement::all();
    $employes = Employe::all();
        return view('pages.Employe.index', compact('employes','Departements','list_Departements'));
    }
    

    public function dashboard(){
        $user = auth('employe')->user();
        
        $projects = $user->Projects()->where('Date_Expire', '>', now())->get();
        $somme=0;
        $completed=0;
        $en_cours=0;
        $echec=0;
        $attente=0;
        foreach ($projects as $project) {
            $somme += $project->taches()->count();
            $completed +=$project->taches()->where('status','termine')->count();
            $en_cours +=$project->taches()->where('status','en_cours')->where('assignment',null)->where('end','>',now())->count();
            $echec +=$project->taches()->where('status','en_cours')->where('assignment',null)->where('end','<',now())->count();
            $attente +=$project->taches()->where('status','en_cours')->where('assignment','!=',null)->count();
        }
       
         $attente=intval(($attente/$somme)*100);
         $completed=intval(($completed/$somme)*100);
         $en_cours= intval(($en_cours/$somme)*100);
         $echec=intval(($echec/$somme)*100);
        return view('pages.Employe.dashboard', compact('projects','attente','completed','en_cours','echec'));
    }

   
    public function create()
    {
        $departements= Departement::all();
        $genders = Gender::all();
        return view('pages.Employe.create',compact('departements','genders'));
        
    }

    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'Name' => 'required|string|max:255',
        'Email' => 'required|email|unique:employes',
        'Address' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'Specialization_id' => 'required',
        'Gender_id' => 'required',
        'Joining_Date' => 'required|date',
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

    
    $employee = new Employe();
    $employee->telephone = $validatedData['Telephone'];
    $employee->FullName = $validatedData['Name'];
    $employee->email = $validatedData['Email'];
    $employee->Address = $validatedData['Address'];
    $employee->password = Hash::make($validatedData['password']);
    $employee->Departement_id = $validatedData['Specialization_id'];
    $employee->Gender_id = $validatedData['Gender_id'];
    $employee->Joining_Date = $validatedData['Joining_Date'];
    if ($request->hasFile('photo')) {
    $path= $this->uploadImage($request,'employes');
    $employee->photo=$path;
    }
    $employe=$employee;
    $employee->save();
    return redirect()->route('Employe.index')->with('message', 'Supervisor created successfully');
}


    public function show(Employe $employe)
    {
        //
    }

   


     public function TaskProject(Int $id){
        $Taches = Project::findOrFail($id)->Taches;
        $termine=0;
        $en_cours=0;
        $overdue=0;
        $somme=0;
        if($Taches->isNotEmpty()){
            foreach($Taches as $tache){
                $somme++;
                if($tache->assignment != null) {
                    $termine++;
                }
                if($tache->assignment == null && $tache->status == 'en_cours' && $tache->end < now()) {
                    $overdue++;
               }  if( $tache->assignment == null && $tache->status == 'en_cours' && $tache->end > now()) {
                   $en_cours++;
               }
            }
        }
        $Taches = Project::findOrFail($id)->Taches->where('status', 'en_cours');
            return view('pages.Employe.taches',compact('Taches','id','overdue','en_cours','termine','somme'));
     }
    public function edit(Int $id)
    {
        
        $departements= Departement::all();
        $genders = Gender::all();
        $employe = Employe::findOrFail($id);
    return view('pages.Employe.edit',compact('employe','departements','genders'));
    }


public function update(Request $request)
{
    $validatedData = $request->validate([
        'Name' => 'required|string|max:255',
        'Email' => 'required|email|unique:employes,email,' . $request->id,
        'Address' => 'required|string|max:255',
        'Specialization_id' => 'required',
        'Gender_id' => 'required',
        'Joining_Date' => 'required|date',
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
    $employe=Employe::findOrFail($request->id);
    $employe->FullName = $validatedData['Name'];
    $employe->email = $validatedData['Email'];
    $employe->Address = $validatedData['Address'];
    
    $employe->telephone = $validatedData['Telephone'];
    
    $employe->Departement_id = $validatedData['Specialization_id'];
    $employe->Gender_id = $validatedData['Gender_id'];
    $employe->Joining_Date = $validatedData['Joining_Date'];
    
    if ($request->hasFile('photo')) {
        $path = $this->uploadImage($request, 'employes');
        $employe->photo = $path;
    }

    $employe->save();

    return redirect()->route('Employe.index')->with('message', 'Supervisor updated successfully');
}


    
    public function destroy(request $request)
    {
        
    Employe::findOrFail($request->id)->delete();
    return Redirect::route('Employe.index')->with([
        'message'=>'Departement deleted successfully'
    ]);;
    }
}