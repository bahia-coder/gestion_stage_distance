<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Stagaire;
use App\Models\Employe;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\Departement;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use UploadImageTrait;
    

    public function index()
    {
        $projects = Project::all();
        $Stagaires = Stagaire::leftJoin('projects', 'stagaires.id', '=', 'projects.Stagaire_id')
        ->whereNull('projects.Stagaire_id')
        ->select('stagaires.*')
        ->get();
        $Departements = Departement::all();
        $Employes = Employe::all();
        return view('pages.Project.index', compact('projects','Stagaires','Departements','Employes'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        try {
            $projects = $request->projects;
            
            if (!empty($projects)) {
                foreach ($projects as $projectData) {
                    
                    $employee = Employe::findOrFail($projectData['Employe_id'])->email;
                    $stagaire = Stagaire::findOrFail($projectData['Stagaire_id'])->email;
                    
                    DB::beginTransaction();
                    
                    $createConversation = Conversation::create([
                        'sender_email' => $employee,
                        'receiver_email' => $stagaire,
                        'last_time_message' => null,
                    ]);
                    
                    Message::create([
                        'conversation_id' => $createConversation->id,
                        'sender_email' => $stagaire,
                        'receiver_email' => $stagaire,
                        'body' => '',
                    ]);
                    
                    DB::commit();
                    
                    if (isset($projectData['nom']) && isset($projectData['Date_Expire']) && isset($projectData['Stagaire_id']) && isset($projectData['Employe_id']) && isset($projectData['Departement_id'])) {
                        $project = new Project();
                        $project->nom = $projectData['nom'];
                        $project->Date_Expire = $projectData['Date_Expire'];
                        $project->Stagaire_id = $projectData['Stagaire_id'];
                        $project->Employe_id = $projectData['Employe_id'];
                        $project->Departement_id = $projectData['Departement_id'];
                        $validator = Validator::make($projectData, [
                            'Date_Expire' => 'required|date|after:now',
                        ]);
        
                        if ($validator->fails()) {
                            return redirect()->back()->with(['error' =>'Expiration date must be in the future.']);
                            throw new \Exception('Expiration date must be in the future.');
                        }
                        $validator = Validator::make($projectData, [
                            'nom' => 'required|unique:projects,nom',
                        ]);
        
                        if ($validator->fails()) {
                            
                        return redirect()->back()->with(['error' =>'The project name is already taken.']);
                            throw new \Exception('The project name is already taken.');
                        }
                        $project->save();
                    } else {
                        throw new \Exception('Project information is not complete.');
                    }
                    
                }
                
                return redirect()->route('Project.index')->with('message','Projects added successfully');
            } else {
                $projectName = $request->input('Name');
                $projectDescription = $request->input('Description');
                
                if (!$projectName || !$projectDescription) {
                    
                    throw new \Exception('Project information is not complete.');
                }
                
                $project = new Project();
                $project->nom = $projectName;
                $project->Description = $projectDescription;
                $project->save();
                
                return redirect()->route('Project.index')->with('message', 'Project added successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    

    public function storep(Request $request){
        return $this->uploadImage($request,'test');
    }

    public function show(Departement $departement)
    {
        //dash
    }
    public function showForm()
    {
        return view('upload');
    }

    public function edit(Departement $departement)
    {
        //
    }
    public function update(Request $request)
    {
        try {

            $projects = Project::findOrFail($request->id);

            $projects->update([

                $projects->nom = $request->Name,
                $projects->Stagaire_id = $request->Stagaire_id,
                $projects->Employe_id = $request->Employe_id,
                $projects->Departement_id = $request->Departement_id,
                $projects->Date_Expire = $request->Date_Expire,
            ]);
            return redirect()->route('Project.index');
        }

        catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'All fields are required.']);
        }
    }

    
    public function destroy(request $request)
    {
        
        $project = Project::findOrFail($request->id)->delete();
        
        return redirect()->route('Project.index');
    }
    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Project::whereIn('id', $delete_all_id)->Delete();
        return redirect()->route('Project.index');
    }

    public function Filter_Departements(Request $request)
    {
        
        $Stagaires = Stagaire::all();
        $Departements = Departement::all();
        $Employes = Employe::all();
        $projects = Project::select('*')->where('Departement_id','=',$request->Departement_id)->get();
        return view('pages.Project.index',compact('Stagaires','Employes','Departements'))->withDetails($projects);

    }
}
