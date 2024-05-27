<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AdminController extends Controller
{
    public function storeStudent(Request $request)
    {
        $validatedData = $request->validate([
            'regno' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'project_description' => 'required|string|max:255',
            'mentor_name' => 'required|string|max:255',
            'mentor_number' => 'required|string|max:255',
            'student_mobile' => 'required|string|max:255',
            'batch_year' => 'required|string|max:255',
        ]);

        $student = Student::create($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'Student added successfully',
            'data' => $student
        ]);
    }

    public function showStudents()
    {
        return view('admin.students');
    }

    public function getStudents()
    {
        $students = Student::all();
        return response()->json($students);
    }
}
