<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = Departement::all();

        // Passez les données des départements à la vue "welcome" en utilisant compact
        return view('pages.Departements.index', compact('departements'));
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
        $departement = new Departement();
        
        $path= $this->uploadImage($request,'departments');
        $departement->path=$path;
        $departement->nom = $request->input('Name');
        $departement->Description = $request->input('Description');
        $departement->save();
        return Redirect::route('Departement.index')->with([
            'success'=>'Departement added successfully'
        ]);
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
      $departement = Departement::findOrFail($request->id);
      if ($request->hasFile('photo')) {
        // Upload image and update path if a new photo is provided
        $path = $this->uploadImage($request, 'departments');
        $departement->path = $path;
    }
      $departement->nom = $request->input('Name');
      $departement->Description = $request->input('Description');
      $departement->save();
      
      return Redirect::route('Departement.index')->with([
        'success'=>'Departement updated successfully'
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        
    Departement::findOrFail($request->id)->delete();
    return Redirect::route('Departement.index')->with([
        'success'=>'Departement deleted successfully'
    ]);;
    }
}
