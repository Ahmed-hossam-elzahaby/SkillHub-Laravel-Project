<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class adminstudentcontroller extends Controller
{
    public function student()
    {


        $studentRole = Role::where('name', 'student')->first();

        $data['students'] = User::where('role_id', $studentRole->id)->orderby('id', 'DESC')->paginate(10);


        return view('admin.students.index')->with($data);
    }


    public function showstudent($id)
    {

        $student = User::findorfail($id);

        if ($student->role->name != 'student') {

            return back();
        }
        $data['student'] = $student;
        $data['exams'] = $student->exams;

        return view('admin.students.show-score')->with($data);
    }
}
