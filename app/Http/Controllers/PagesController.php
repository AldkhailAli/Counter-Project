<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class PagesController extends Controller
{
    public function display() // the page who the customers can see what's going on
    {
        return view('page.display'); // return with the display page in page folder in resource
    }

    public function dispenser() // the page who the customers can take tickets for them
    {
        return view('page.dispenser'); // return with the dispenser page in page folder in resource
    }
    
    public function queue() // the page who the admin can controll and know what's going on on it
    {
        $tickets = Ticket::all();
        return view('page.queue', compact('tickets')); // return with the queue page in page folder in resource
    }
    
    public function login(){ // the page who the admin can access to his account so easily
        return view('page.login'); // return the login page in page folder in resource
    }
    
}
