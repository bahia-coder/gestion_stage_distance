<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Notifications\CreateTache;
use App\Models\Meeting;
use App\Models\Stagaire;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class TacheController extends Controller
{
    use UploadImageTrait;
   
   

public function Notes(){
    $user=auth('stagaire')->user();
    $taches=$user->Taches;
   if($user->Taches->count()!=0){
    $termine=intval(($taches->where('status','terminé')->count() / $user->Taches->count()) *100);
    $en_cours=intval(($taches->where('status','en_cours')->where('end', '<', now()->toDateString())->count() / $user->Taches->count()) *100);
    $en_attente=intval(($taches->where('status','en_cours')->where('assignment','!=',null)->count() / $user->Taches->count()) *100);
    $overdue = intval(($taches->where('status', 'en_cours')
    ->where('assignment', null)
    ->where('end', '<', now()->toDateString())
    ->count() / $user->Taches->count()) * 100);
   }
   else{
    $termine=0;
   $en_cours=0;
   $en_attente=0;
   $overdue=0;
   }
   $taches=$user->Taches->where('status','terminé');
    return view('pages.Stagaire.Notes', compact('taches','en_cours','en_attente','overdue','termine'));

}
//index
    public function Tasks(){
        $user = auth('stagaire')->user();
        $taches = Tache::where('Stagaire_id', $user->id)->with('stagaire')->get();
        $en_cours=Tache::where('Stagaire_id', $user->id)->where('end','>',now())->where('assignment',null)->get();

        $events = [];

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
        $not_id=DB::table('notifications')->where('type','App\Notifications\CreateTache')->where('notifiable_id',auth('stagaire')->user()->id)->pluck('id');
        DB::table('notifications')->whereIn('id',$not_id)->update(['read_at'=>now()]);
        return view('pages.Stagaire.test', compact('events','en_cours'));
    }


    public function assignment(Request $request){
        $tache =  Tache::where('id', $request->tache_id)->first();
        
        $path= $this->uploadImage($request,'assignments');
        $tache->assignment=$path;
        $tache->save();
        
        return redirect()->route('Tasks');
      
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    { 
        $taches = $request->projects;
        $project=null;
       
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
                                if ($tacheData['Date_Start'] >= $tacheData['Date_End']) {
                                    return redirect()->route('Employee.Project',$project->id)->with('error','Start date must be before end date.');
                                }
                                if (strtotime($tacheData['Date_Start']) <  strtotime('now')) {
                                    return redirect()->route('Employee.Project',$project->id)->with('error','The Task start date must be in the future.');
                                }
                            $tache->save();
                    
                }
                $user = Stagaire::find($tache->Stagaire_id);
              
               Notification::send($user, new CreateTache($tache->id));
               
                return redirect()->route('Employee.Project',$project->id)->with('message', 'Task has been successfully created!');
            } else {
                $tache = new Tache();
                $tache->nom = $request->input('Name');
                $tache->start = $request->input('Date_Start');
                $tache->start = $request->input('Date_End');
                $project = Project::find($request->input('id'));

                    $tache->Stagaire_id = $project->Stagaire_id;
                    $tache->Project_id = $request->input('id');
                    $tache->save();

                    $user = Stagaire::find($tache->Stagaire_id);
                    Notification::send($user, new CreateTache($tache->id));
                return "redirect()->route('Project.index')->with('success', 'Project added successfully')";
            }
      
    }
    
    
    public function show(Tache $tache)
    {
        //dash
    }

   
    public function edit(Tache $tache)
    {
        //
    }

    public function update(Request $request)
    {
        if ($request->input('start') >= $request->input('end')) {
            return redirect()->route('Employee.Project',$request->id_project)->with('error','Start date must be before end date.');
        }
        $tache = Tache::findOrFail($request->id);
        
        $tache->title = $request->input('Name');
        $tache->start = $request->input('start');
        $tache->end = $request->input('end');
        $tache->save();
        return redirect()->route('Employee.Project',$request->id_project)->with('message', 'Task has been successfully updated!');
       
    }


     public function delete_all(Request $request)
    {
        $project = Project::find($request->id);
        $delete_all_id = explode(",", $request->delete_all_id);

        Tache::whereIn('id', $delete_all_id)->Delete();
        return redirect()->route('Employee.Project',$project->id)->with('message', 'Tasks has been successfully deleted!');
    }
    public function destroy(request $request)
    {
        $project = Project::find($request->project_id);
        $tache = Tache::findOrFail($request->id)->delete();
        
        return redirect()->route('Employee.Project',$project->id)->with('message', 'Tasks has been successfully deleted!');
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
