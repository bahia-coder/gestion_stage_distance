<?php
namespace App\Traits;
use Illuminate\Http\Request;

Trait UploadImageTrait{
    public function uploadImage(Request $request,$folderName){
        $image=$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs($folderName,$image,'bahya');
        return $path;
    }
    public function uploadImagee(Request $request,$folderName){
        $image=$request->input('photo')->getClientOriginalName();
        $path = $request->input('photo')->storeAs($folderName,$image,'bahya');
        return $path;
    }
    public function uploadCv(Request $request,$folderName){
        $image=$request->file('cv')->getClientOriginalName();
        $path = $request->file('cv')->storeAs($folderName,$image,'bahya');
        return $path;
    }
}