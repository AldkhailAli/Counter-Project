<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LangController extends Controller
{
    public function lang($lang, $route)
    {
        Session::put('lang', $lang);
        app()->setLocale($lang);
        if($route == null) $route = "welcome";
        return redirect()->route($route);
    }
}
