<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid as UUID;
use App\AdminPassword;
use Session;

class AdminController extends Controller
{
    /*
    IMPORTANT: the view method of this has been moved to the PagesController
    */
    public function login($password)
    {
        if($password == null) return response(405); // if the request doesn't have password
        $admin = AdminPassword::find(0); // find the admin with id 0 ( no more than that)
        if($admin == null) { // if there's not any admin
            $admin = new AdminPassword; // create new admin
            $admin->id = 0; // set the id to 0
            $admin->password = (string)UUID::generate(4); // generate new password
            $admin->save(); // save the admin model in the database
        }
        if($password == $admin->password) { // if the password equals the admin passowrd
            Session::put('isAdmin', true); // put the isAdmin to true because he is admin
        }else { // if he isn't an admin
            Session::put('isAdmin', false); // put the isAdmin to false because he isn't the admin
            return response(202); // response with auth required
        }
        return response(200); // response with successfully
    }
    
    public function call(){ // call the next ticket of the teacher
        return; // empty function
    }
    
    public function recall(){ // re call the ticket of the teacher
        return; // empty function
    }
    
    public function skip(){ // skip the ticket of the teacher
        return; // empty function
    }
    
    public function done(){ // done the ticket of the teacher
        return; // empty function
    }
    
    public function now(){ // get the ticket of the teacher for now
        return; // empty function
    }
    
}
