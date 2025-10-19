<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use Redirect;

class LangController extends Controller
{
    /**
     * Display the language switcher page.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeLanguage($lang)
    {
        App::setLocale($lang);
        \LaravelLocalization::setLocale($lang);
        $url = \LaravelLocalization::getLocalizedURL(App::getLocale(), \URL::previous());
       return Redirect::to($url); 
    }

    /**
     * Change the application language.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}