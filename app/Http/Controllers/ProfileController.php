<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $information = User::findorFail(auth()->user()->id);
        return view('Profile', compact('information'));
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
