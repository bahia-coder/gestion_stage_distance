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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index()
    {
    $Departements = Departement::with(['employes'])->get();
    $list_Departements = Departement::all();
    $employes = Employe::all();
        // Passez les données des départements à la vue "welcome" en utilisant compact
        return view('pages.Employe.index', compact('employes','Departements','list_Departements'));
    }
    public function projects(){
        
    }

    public function dashboard(){
        $user = auth('employe')->user();
        
        //$projects = $user->Projects()->get();
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
        //return $projects;
        return view('pages.Employe.dashboard', compact('projects','attente','completed','en_cours','echec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements= Departement::all();
        $genders = Gender::all();
        return view('pages.Employe.create',compact('departements','genders'));
        
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
        'Email' => 'required|email|unique:employes',
        'Address' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'Specialization_id' => 'required',
        'Gender_id' => 'required',
        'Joining_Date' => 'required|date',
        'Telephone'=>'required|max:10'
    ]);

    // Process the validated data and store the new employee
    
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
    //$employe->password = $validatedData['password'];
    $employee->save();
    //Mail::to($employee->email)->send(new EmployeeCreated($employe));

    // Redirect the user after storing the employee
    return redirect()->route('Employe.index')->with('success', 'Employee added successfully');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */


     public function TaskProject(Int $id){
        $Taches = Project::findOrFail($id)->Taches->where('status', 'en_cours');
      
            return view('pages.Employe.taches',compact('Taches','id'));
     }
    public function edit(Int $id)
    {
        
        $departements= Departement::all();
        $genders = Gender::all();
        $employe = Employe::findOrFail($id);
    return view('pages.Employe.edit',compact('employe','departements','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
   /**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Employe  $employe
 * @return \Illuminate\Http\Response
 */
public function update(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'Name' => 'required|string|max:255',
        'Email' => 'required|email|unique:employes,email,' . $request->id,
        'Address' => 'required|string|max:255',
        'Specialization_id' => 'required',
        'Gender_id' => 'required',
        'Joining_Date' => 'required|date',
        'Telephone'=>'required|max:10',
    ]);
    $employe=Employe::findOrFail($request->id);
    // Update the employee record
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

    return redirect()->route('Employe.index')->with('success', 'Employee updated successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        
    Employe::findOrFail($request->id)->delete();
    return Redirect::route('Employe.index')->with([
        'success'=>'Departement deleted successfully'
    ]);;
    }
}
