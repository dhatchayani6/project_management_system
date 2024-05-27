<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Hash;

class StudentController extends Controller
{
    public function show_student()
    {
        $student = Student::all();
        return view('admin.student', compact('student'));
    }
    public function student_register()
    {
        return view('student.student_register');
    }

    public function accept(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        // Find the student record by email
        $student = Student::where('email', $request->email)->first();

        if ($student) {
            // Retrieve password from student record
            $password = $student->password;

            // Create new user with student's name, email, and password
            $user = new User();
            $user->name = $student->name; // Set user's name from student's record
            $user->email = $request->email;
            $user->password = $password;
            $user->usertype = 'student'; // Set user's type to 'student'
            $user->save();

            // Update student status to "accepted"
            $student->status = 'accepted'; // Update status to 'accepted'
            $student->save();

            return response()->json(['message' => 'Student accepted and user stored successfully'], 200);
        } else {
            return response()->json(['message' => 'Student not found'], 404);
        }
    }


    public function reject(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required|email',
        ]);

        // Find the student record by email
        $student = Student::where('email', $request->email)->first();

        if ($student) {
            // Update student status to "rejected"
            $student->status = 'rejected';
            $student->save();

            return response()->json(['message' => 'Student rejected successfully'], 200);
        } else {
            return response()->json(['message' => 'Student not found'], 404);
        }
    }

}
