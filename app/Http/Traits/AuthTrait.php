<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request){

        if($request->type == 'stagaire'){
            $guardName= 'stagaire';
        }
        elseif ($request->type == 'employe'){
            $guardName= 'employe';
        }
        else{
            $guardName= 'web';
        }
        return $guardName;
    }

    public function redirect($request){

        if($request->type == 'stagaire'){
            return redirect()->intended(RouteServiceProvider::STAGAIRE);
        }
        elseif ($request->type == 'employe'){
            return redirect()->intended(RouteServiceProvider::EMPLOYE);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
