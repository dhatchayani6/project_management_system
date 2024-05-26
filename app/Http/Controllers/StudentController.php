<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show_student(){
        $student=Student::all();
        return view('admin.student',compact('student'));
    }
    public function student_register(){
        return view('student.student_register');
    }

    public function store_student(Request $request){
        $student=new student();
        $student->regno=$request->input('regno');
        $student->name=$request->input('name');
        $student->email=$request->input('email');
        $student->password=$request->input('password');
        $student->project_title=$request->input('title');
        $student->project_description=$request->input('description');
        $student->mentor_name=$request->input('mentor_name');
        $student->mentor_number=$request->input('mentor_number');
        $student->student_mobile=$request->input('student_mobile');
        $student->batch_year=$request->input('batch_year');
        $student->save();
        return redirect()->route('admin.students')->with('success', 'Student added successfully!');

    }

    public function fetchstudent(){
        $student=Student::all();
        return response()->json(['student' => $student]);
        // return view('student.student_register',compact('student'));
    }
    
}
