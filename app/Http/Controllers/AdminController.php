<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

class AdminController extends Controller
{
    public function fetchStudents()
    {
        // Fetch all students
        $students = Student::all();

        // Return the students data in JSON format
        return response()->json(['students' => $students]);
    }
}


