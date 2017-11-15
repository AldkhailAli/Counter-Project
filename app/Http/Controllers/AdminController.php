<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid as UUID;
use App\AdminPassword;
use Session;
use App\Ticket;

class AdminController extends Controller
{
    /*
    IMPORTANT: the view method of this has been moved to the PagesController
    */
    public function login(Request $req)
    {
        $username = $req->input('username'); $password = $req->input('password');
        if($password == null) return response(405); // if the request doesn't have password
        if($username != "iHDeveloper" && $username != "AliMd") return response(201); // the username is not match then what we know
        $admin = AdminPassword::find(1); // find the admin with id 0 ( no more than that)
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
        return redirect()->route('welcome'); // response with successfully
    }
    
    public function call($id){ // call the next ticket of the teacher
        $teacher = $this->teacherExist($id); // call the teacher exist with enter the id parm
        if($teacher == null) return response(404); // if not found the teacher then response 404
        $now = $teacher->now; // call the now parm in the teacher object
        if($now != null){ // if it's the first call then it will never add anything on done array
            $done = json_decode($teacher->done, true); // call the done array and decode it by json
            array_push($done, $now); // push the now parm of the teacher object into the done array
            $teacher->done = json_encode($done); // update the done array
            $ticket = Ticket::find($now); // try to find the ticket of the old one
            $ticket->destory(); // destory the old ticket
        }
        $queue = json_decode($teacher->queue, true); // call the queue array
        if($queue[0] == null) return response(300); // if there is not anyone in the queue array
        $now = $queue[0]; // update the now to be the next ticket
        $teacher->now = $now; // update the now parm in the teacher
        unset($queue[0]); // remove the now parm from the queue list
        $teacher->queue = json_encode($queue); // update the queue list in the teacher object
        $teacher->save(); // save the teacher in the database
        return response()->json($now); // return the ticket id
    }
    
    public function recall($id){ // re call the ticket of the teacher
        $teacher = $this->teacherExist($id); // call the teacher exist with enter the id parm
        if($teacher == null) return response(404); // if not found the teacher then response 404
        $now = $teacher->now; // call the now parm in the teacher
        return response()->json($now); // return the now parm from the teacher
    }
    
    public function skip($id){ // skip the ticket of the teacher
        $teacher = $this->teacherExist($id); // call the teacher exist with enter the id parm
        if($teacher == null) return response(404); // if not found the teacher then response 404
        $now = $teacher->now; // call the now parm in the teacher object
        if($now != null){ // if there is an old call
            $skip = json_decode($teacher->skip, true); // call the done array and decode it by json
            array_push($skip, $now); // push the now parm of the teacher object into the done array
            $teacher->skip = json_encode($skip); // update the skip parm in the teacher
            $ticket = Ticket::find($now); // find the ticket id by the skip parm
            $ticket->destory(); // remove the ticket from the database
        }
        $queue = json_decode($teacher->queue, true); // call the queue list
        if($queue[0] == null) return response(300); // if there's not anyone is next to call
        $now = $queue[0]; // update the now parm by the first item in the queue list
        $teacher->now = $now; // update the now parm in the teacher
        unset($queue[0]); // remove the now parm from the queue list
        $teacher->queue = json_encode($queue); // update the queue list in the teacher object
        $teacher->save(); // save the teacher object
        return response()->json($now);
    }
    
    private function teacherExist($id){ // check if the teacher exist or no then return it
       $teacher = Teacher::find($id); // get the teacher by the id
       if($teacher == null) return null; // if the teacher object is empty then return nothing
       return $teacher; // if the teacher found then return teacher object
    }
    
}
