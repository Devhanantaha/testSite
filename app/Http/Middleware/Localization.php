<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Session;

class Localization
{
    public function handle(Request $request, Closure $next)
    {
       
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        } else {
            session()->put('locale', 'ar');
        }
        return $next($request);       
    }
}