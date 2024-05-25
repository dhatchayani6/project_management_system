<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function student_register(){
        return view('admin.student_register');
    }
}
