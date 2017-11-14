<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function display()
    {
        return view('page.display');
    }

        public function dispenser()
    {
        return view('page.dispenser');
    }
    
        public function queue()
    {
        return view('page.queue');
    }
}