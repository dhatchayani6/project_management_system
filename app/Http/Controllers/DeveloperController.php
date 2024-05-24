<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    //
    public function show()
    {
        $developers = Developer::all();
        return view('admin.developer', compact('developers'));
    }


    public function developer_add(Request $request)
    {
        $developer = new Developer();
        $developer->bioid = $request->bioid;
        $developer->name = $request->name;
        $developer->email = $request->email;
        $developer->designation = $request->designation;
        $developer->mobile_number = $request->mobile;
        $developer->save();
        return redirect()->back()->with('message', 'Developer added successfully!');

    }


    public function edit_developer($id)
    {
        $developer = Developer::find($id);
        if ($developer) {
            return response()->json([
                'status' => 200,
                'developer' => $developer,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No developer Found.'
            ]);
        }

    }

    public function update_developer(Request $request, $id)
    {
        try {
            $developer = Developer::find($id);

            if (!$developer) {
                return response()->json(['message' => 'Developer not found'], 404);
            }

            // Validate the request data
            $request->validate([
                'bioid' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'designation' => 'required|string|max:255',
                'mobile' => 'required|string|max:15',
            ]);

            // Update the developer details
            $developer->bioid = $request->input('bioid');
            $developer->name = $request->input('name');
            $developer->email = $request->input('email');
            $developer->designation = $request->input('designation');
            $developer->mobile = $request->input('mobile');
            $developer->save();

            return response()->json(['message' => 'Developer updated successfully', 'developer' => $developer]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error'], 500);
        }


    }
    
    public function fetchDevelopers(){
        $developers=Developer::all();
        return view('admin.developer',compact('developers'));

    }
}
