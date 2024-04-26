<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AnnonceController extends Controller
{
   
    public function index()
    {
        $annonces = Annonce::all();
        return view('pages.Annonce.index', compact('annonces'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $annonce = new Annonce();
        
        $annonce->Body = $request->input('Body');
        $signatureData = $request->input('signatureData'); // Assurez-vous de nommer correctement le champ de la signature dans votre formulaire
    $annonce->signature = $signatureData;
        
        $annonce->Title = $request->input('Title');
        $annonce->save();
        return Redirect::route('annonce.index')->with([
            'success'=>'annonce added successfully'
        ]);
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
        $annonce = Annonce::findOrFail($request->id);
      $annonce->Title = $request->input('Title');
      $annonce->Body = $request->input('Body');
      $annonce->save();
      
      return Redirect::route('annonce.index')->with([
        'success'=>'annonce updated successfully'
    ]);
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
        $pdf = Pdf::loadView('pages.Annonce.pdf',compact('annonce'));
        return $pdf->download();
    }
}
