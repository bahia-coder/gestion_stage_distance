<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Stagaire;
use App\Models\Employe;
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
        $Stagaires = Stagaire::all();
        $Departements = Departement::all();
        $Employes = Employe::all();
        // Passez les données des départements à la vue "welcome" en utilisant compact
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

        // Si des projets sont soumis
        if (!empty($projects)) {
            foreach ($projects as $projectData) {
                $project = new Project();

                // Assurez-vous que toutes les données nécessaires sont fournies avant de sauvegarder
                if (isset($projectData['nom'])) {
                    $project->nom = $projectData['nom'];
                    $project->Date_Expire = $projectData['Date_Expire'];
                    $project->Stagaire_id = $projectData['Stagaire_id'];
                    $project->Employe_id = $projectData['Employe_id'];
                    $project->Departement_id = $projectData['Departement_id'];
                    $project->save();
                }
            }

            return redirect()->route('Project.index');
        } else {
            // Si aucun projet n'est soumis, traitez le formulaire pour un seul projet
            $project = new Project();
            $project->nom = $request->input('Name');
            $project->Description = $request->input('Description');
            $project->save();

            return redirect()->route('Project.index')->with('success', 'Project added successfully');
        }
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}

    public function storep(Request $request){
        return $this->uploadImage($request,'test');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        //
    }
    public function showForm()
    {
        return view('upload');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
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

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
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
