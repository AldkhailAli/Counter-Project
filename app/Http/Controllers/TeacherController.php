<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Webpatser\Uuid\Uuid as UUID;

class TeacherController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();
        return view('page.teachers', compact('teachers'));
    }

    public function get()
    {
        if($id == null) return response()->json(Teacher::all());
        $teacher = Teacher::find($id);
        if($teacher == null) return response(404);
        return response()->json($teacher);
    }

    public function post($fname, $mname, $lname, $phonenumber)
    {
        if($fname == null || $mname == null || $lname == null) return response(405);
        if($phonenumber == null) return response(405);
        $name = array();
        $name['first'] = $fname;
        $name['middle'] = $mname;
        $name['last'] = $lname;
        $teacher = new Teacher;
        $teacher->firstname = $name['first'];
        $teacher->middlename = $name['middle'];
        $teacher->lastname = $name['last'];
        $teacher->phonenumber = $phonenumber;
        $teacher->password = substr((string)UUID::generate(4), 20);
        $teacher->save();
        return $teacher;
    }

    public function put(Request $req)
    {
        return response(503);
    }

    public function del(Request $req)
    {
        return response(503);
    }
}
