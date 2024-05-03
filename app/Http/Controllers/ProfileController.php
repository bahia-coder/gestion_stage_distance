<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employe;
use App\Models\Stagaire;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use UploadImageTrait;
    public function index()
    {
        $information = User::findorFail(auth()->user()->id);
        return view('Profile', compact('information'));
    }
    public function employe(){
        $information = Employe::findorFail(auth('employe')->user()->id);
        return view('pages.Employe.profile', compact('information'));
    }

    public function stagaire(){
        $information = Stagaire::findorFail(auth('stagaire')->user()->id);
        return view('pages.Stagaire.profile', compact('information'));
    }
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }
public function employe_edit(Request $request){
    
   
    $information = Employe::findorFail(auth('employe')->user()->id);

    if (!empty($request->password)) {
        $information->FullName = $request->input('fullName');
        $information->email = $request->input('email');
        $information->telephone = $request->input('telephone');
        if ($request->hasFile('photo')) {
            $path = $this->uploadImage($request, 'employes');
            $information->photo = $path;
        }
        $information->Address = $request->input('Addresse');
        $information->password = Hash::make($request->input('password'));
        $information->save();
    } else {
        if ($request->hasFile('photo')) {
            $path = $this->uploadImage($request, 'employes');
            $information->photo = $path;
        }
        $information->FullName = $request->input('fullName');
        $information->email = $request->input('email');
        $information->telephone = $request->input('telephone');
        $information->Address = $request->input('Addresse');
        $information->save();
    }
    return redirect()->back();
}

public function stagaire_edit(Request $request){
    
   
    $information = Stagaire::findorFail(auth('stagaire')->user()->id);

    if (!empty($request->password)) {
        $information->FullName = $request->input('fullName');
        $information->email = $request->input('email');
        $information->telephone = $request->input('telephone');
        if ($request->hasFile('photo')) {
            $path = $this->uploadImage($request, 'employes');
            $information->photo = $path;
        }
        $information->Address = $request->input('Addresse');
        $information->password = Hash::make($request->input('password'));
        $information->save();
    } else {
        if ($request->hasFile('photo')) {
            $path = $this->uploadImage($request, 'employes');
            $information->photo = $path;
        }
        $information->FullName = $request->input('fullName');
        $information->email = $request->input('email');
        $information->telephone = $request->input('telephone');
        $information->Address = $request->input('Addresse');
        $information->save();
    }
    return redirect()->back();
}

    public function update(Request $request,$id)
    {
        $information = User::findorFail($id);

        if (!empty($request->password)) {
            $information->name = $request->Name_ar;
            $information->email = $request->Name_en;
            $information->password = Hash::make($request->password);
            $information->save();
        } else {
            $information->name = $request->Name_ar;
            $information->email = $request->Name_en;
            $information->save();
        }
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
