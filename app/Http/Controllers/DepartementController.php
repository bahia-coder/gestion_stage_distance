<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    use UploadImageTrait;
    
    public function index()
    {
        $departements = Departement::all();
        return view('pages.Departements.index', compact('departements'));
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->input('Description')!=null && $request->input('Name')!=null && $request->file('photo')!=null) {
            
            $validator = Validator::make($request->all(), [
                'Name' => 'unique:departements,nom',
            ]);
            

            if ($validator->fails()) {
                
                return redirect()->back()->with(['error' =>'The departement name is already taken.']);
            }
            $departement = new Departement();
            $path = $this->uploadImage($request, 'departments');
            $departement->path = $path;
            $departement->nom = $request->input('Name');
            $departement->Description = $request->input('Description');
            $departement->save();
            return Redirect::route('Departement.index')->with('message', 'Department created successfully');
       
        }else{
            return Redirect::route('Departement.index')->with('error', 'Departement information is not complete.');
        }
        }
    
    public function storep(Request $request){
        return $this->uploadImage($request,'test');
    }

   
    public function show(Departement $departement)
    {
        //
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
      $departement = Departement::findOrFail($request->id);
      if ($request->hasFile('photo')) {
        $path = $this->uploadImage($request, 'departments');
        $departement->path = $path;
    }
    $validator = Validator::make($request->all(), [
        'Name' => 'unique:departements,nom',
    ]);
    

    if ($validator->fails()) {
        
        return redirect()->back()->with(['error' =>'The departement name is already taken.']);
    }
    if ($request->input('Description')!=null && $request->input('Name')!=null){
        $departement->nom = $request->input('Name');
      $departement->Description = $request->input('Description');
      $departement->save();
      return Redirect::route('Departement.index')->with([
        'message'=>'Departement updated successfully'
    ]);
     
    }
    else{
        return Redirect::route('Departement.index')->with([
            'error'=>'Departement information is not complete.'
        ]);
    }
    }

   
    public function destroy(request $request)
    {
        
    Departement::findOrFail($request->id)->delete();
    return Redirect::route('Departement.index')->with([
        'success'=>'Departement deleted successfully'
    ]);;
    }
}
