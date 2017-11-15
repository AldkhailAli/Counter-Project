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
    public function login($username, $password)
    {
        if($password == null) return response(405); // if the request doesn't have password
        if($username != "iHDeveloper" && $username != "AliMd") return response(201); // the username is not match then what we know
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
    
    public function call($id){ // call the next ticket of the teacher
        $teacher = teacherExist($id); // call the teacher exist with enter the id parm
        if($teacher == null) return response(404); // if not found the teacher then response 404
        return; // empty function
    }
    
    public function recall($id){ // re call the ticket of the teacher
        $teacher = teacherExist($id); // call the teacher exist with enter the id parm
        if($teacher == null) return response(404); // if not found the teacher then response 404
        return; // empty function
    }
    
    public function skip($id){ // skip the ticket of the teacher
        $teacher = teacherExist($id); // call the teacher exist with enter the id parm
        if($teacher == null) return response(404); // if not found the teacher then response 404
        return; // empty function
    }
    
    public function done(){ // done the ticket of the teacher
        $teacher = teacherExist($id); // call the teacher exist with enter the id parm
        if($teacher == null) return response(404); // if not found the teacher then response 404
        $now = $teacher->now; // call the now parm in the teacher object
        $done = json_decode($teacher->done, true); // call the done array and decode it by json
        array_push($done, $now); // push the now parm of the teacher object into the done array
        $teacher->done = json_encode($done);
        // TODO continue the function
        return; // empty function
    }
    
    public function now(){ // get the ticket of the teacher for now
        $teacher = teacherExist($id); // call the teacher exist with enter the id parm
        if($teacher == null) return response(404); // if not found the teacher then response 404
        $now = $teacher->now; // call the now parm in the teacher
        return response()->json($now); // return the now parm from the teacher
    }
    
    private function teacherExist($id){ // check if the teacher exist or no then return it
       $teacher = Teacher::find($id); // get the teacher by the id
       if($teacher == null) return null; // if the teacher object is empty then return nothing
       return $teacher; // if the teacher found then return teacher object
    }
    
}
