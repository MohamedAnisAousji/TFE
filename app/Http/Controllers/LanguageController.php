<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Closure;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
      public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }
        return $next($request);
    }
}
