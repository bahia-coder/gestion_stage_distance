<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Setting;
use App\Models\Departement;
use App\Models\Stagaire;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Notifications\CreateAnnonce;
use Barryvdh\DomPDF\Facade\Pdf;

class AnnonceController extends Controller
{
   
    public function index()
    {
        $annonces = Annonce::all();
        $departements = Departement::all();
        return view('pages.Annonce.index', compact('annonces','departements'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       try{
        $annonce = new Annonce();
        
        $annonce->Body = $request->input('Body');
        $annonce->Departement_id = $request->input('Departement_id');
        $signatureData = $request->input('signatureData'); // Assurez-vous de nommer correctement le champ de la signature dans votre formulaire
        $annonce->signature = $signatureData;
        
        $annonce->Title = $request->input('Title');
        $annonce->save();
        
 
        $users=Stagaire::where('Departement_id',$annonce->Departement_id )->get();
        Notification::send($users, new CreateAnnonce($annonce->id,$annonce->Title));
        return Redirect::route('annonce.index')->with([
            'message'=>'Advertesment created successfully'
        ]);
       }catch(\Exception $e){
        return Redirect::route('annonce.index')->with(
           'error','All fields are required.');
       }
    }

    public function show(Annonce $annonce)
    {
        //
    }

    public function edit(Annonce $annonce)
    {
        //
    }

    public function update(Request $request)
    {
        try{
        $annonce = Annonce::findOrFail($request->id);
      $annonce->Title = $request->input('Title');
      $annonce->Body = $request->input('Body');
      $annonce->save();
      
      return Redirect::route('annonce.index')->with([
        'message'=>'Advertesment updated successfully'
    ]);
    }catch(\Exception $e){
        return Redirect::route('annonce.index')->with(
        'error','All fields are required.');
    }
    }

    public function destroy(request $request)
    {
        Annonce::findOrFail($request->id)->delete();
        return Redirect::route('annonce.index')->with([
            'success'=>'annonce deleted successfully'
        ]);;
    }
    public function pdf($id){
        $annonce = Annonce::where('id',$id)->first();
        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        
        $pdf = Pdf::loadView('pages.Annonce.pdf',compact('annonce','setting'));
        if(auth('stagaire')->user())
        {
            $not_id=DB::table('notifications')->where('data->annonce_id',$id)->where('notifiable_id',auth('stagaire')->user()->id)->pluck('id');
            DB::table('notifications')->where('id',$not_id)->update(['read_at'=>now()]);
            //return $not_id;
        }
        

        return $pdf->download();
    }
}
