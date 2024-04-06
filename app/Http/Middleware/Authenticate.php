<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Request::is(app()->getLocale() . '/stagaire/dashboard')) {
                return route('selection');
            }
            elseif(Request::is(app()->getLocale() . '/employe/dashboard')) {
                return route('selection');
            }
            else {
                return route('selection');
            }
        }
    }
}
