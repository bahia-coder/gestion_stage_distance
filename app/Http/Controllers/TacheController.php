<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Project;
use App\Models\Meeting;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class TacheController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('stagaire')->user();
        $meetings = Meeting::where('Stagaire_id', $user->id)
        ->whereRaw('start_at + INTERVAL duration SECOND > NOW()')
        ->get();
        $taches=$user->Taches;
    $tachess=$user->Taches->where('assignment','!=',null);
    $pourcentage= intval(($tachess->count() / $taches->count()) * 100);
        //return $meetings;

        // Récupérer les tâches du stagiaire authentifié avec la relation "stagaire"
        $taches = Tache::where('Stagaire_id', $user->id)->with('stagaire')->get();
        $project = Project::where('Stagaire_id', $user->id)
        ->with('Stagaires')
        ->latest() // Trie par date de création décroissante
        ->first();
        $events = [];
        $tachess=$taches->where('assignment',null);

        foreach ($taches as $tache) {
            if($tache->assignment==null){
                $events[] = [
                    'title' => $tache->Title, // Titre de l'événement
                    'start' => $tache->start, // Date de début
                    'end' => $tache->end, // Date de fin
                    'id' => $tache->id,
                ];
            }
        }

        return view('pages.Stagaire.dashboard', compact('events','project','tachess','meetings','pourcentage'));
    }

public function Notes(){
    $user=auth('stagaire')->user();
    $taches=$user->Taches;
    $termine=intval(($taches->where('status','terminé')->count() / $user->Taches->count()) *100);
   $en_cours=intval(($taches->where('status','en_cours')->where('end', '<', now()->toDateString())->count() / $user->Taches->count()) *100);
   $en_attente=intval(($taches->where('status','en_cours')->where('end', '<', now()->toDateString())->where('assignment','!=',null)->count() / $user->Taches->count()) *100);
   $overdue = intval(($taches->where('status', 'en_cours')
   ->where('assignment', '!=', null)
   ->where('end', '<', now()->toDateString())
   ->count() / $user->Taches->count()) * 100);
    return view('pages.Stagaire.Notes', compact('taches','en_cours','en_attente','overdue','termine'));

}
    public function Tasks(){
        $user = auth('stagaire')->user();

        // Récupérer les tâches du stagiaire authentifié avec la relation "stagaire"
        $taches = Tache::where('Stagaire_id', $user->id)->with('stagaire')->get();

        $events = [];

        foreach ($taches as $tache) {
            if($tache->assignment==null){
                $events[] = [
                    'title' => $tache->Title, // Titre de l'événement
                    'start' => $tache->start, // Date de début
                    'end' => $tache->end, // Date de fin
                    'id' => $tache->id,
                ];
            }
        }

        return view('pages.Stagaire.test', compact('events'));
    }


    public function assignment(Request $request){
        $tache =  Tache::where('id', $request->tache_id)->first();
        
        $path= $this->uploadImage($request,'assignments');
        $tache->assignment=$path;
        $tache->save();
        return "Redirect::route('Departement.index')->with([
            'success'=>'Departement added successfully'
        ]);";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taches = $request->projects;
        $project=null;
            // Si des tâches sont soumises
            if (!empty($taches)) {
                foreach ($taches as $tacheData) {
                    $tache = new Tache();
    
                        $tache->Title = $tacheData['nom'];
                        $tache->start = $tacheData['Date_Start'];
                        $tache->end = $tacheData['Date_End'];
    
                        if($project==null){
                            $project = Project::find($tacheData['id']);
                        }
    
                            $tache->Stagaire_id = $project->Stagaire_id;
                            $tache->Project_id = $project->id;
                            $tache->save();
                    
                }
    
                return redirect()->route('Employee.Project',$project->id)->with('success', 'Tâches ajoutées avec succès.');
            } else {
                $tache = new Tache();
                $tache->nom = $request->input('Name');
                $tache->start = $request->input('Date_Start');
                $tache->start = $request->input('Date_End');
                $project = Project::find($request->input('id'));

                    $tache->Stagaire_id = $project->Stagaire_id;
                    $tache->Project_id = $request->input('id');
                    $tache->save();
    
                return "redirect()->route('Project.index')->with('success', 'Project added successfully')";
            }
      
    }
    
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function show(Tache $tache)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function edit(Tache $tache)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $tache = Tache::findOrFail($request->id);
        
        $tache->title = $request->input('Name');
        $tache->start = $request->input('start');
        $tache->end = $request->input('end');
        $tache->save();
        return redirect()->route('Employee.Project',$request->id_project)->with('success', 'Tâches modifié avec succès.');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */

     public function delete_all(Request $request)
    {
        $project = Project::find($request->id);
        $delete_all_id = explode(",", $request->delete_all_id);

        Tache::whereIn('id', $delete_all_id)->Delete();
        return redirect()->route('Employee.Project',$project->id)->with('success', 'Tâches deleted avec succès.');
    }
    public function destroy(request $request)
    {
        $project = Project::find($request->project_id);
        $tache = Tache::findOrFail($request->id)->delete();
        
        return redirect()->route('Employee.Project',$project->id)->with('success', 'Tâches deleted avec succès.');
    }
    public function Totale(int $id,int $project_id){
        $tache = Tache::findOrFail($id);
        $tache->note=20;
        $tache->status='terminé';
        $tache->save();
        return redirect()->route('Employee.Project',$project_id);
    }
    public function Half(int $id,int $project_id){
        $tache = Tache::findOrFail($id);
        $tache->note=10;
        
        $tache->status='terminé';
        $tache->save();
        return redirect()->route('Employee.Project',$project_id);
    }
    public function Nothing(int $id,int $project_id){
        $tache = Tache::findOrFail($id);
        $tache->note=0;
        $tache->status='terminé';
        $tache->save();
        return redirect()->route('Employee.Project',$project_id);
    }
}
