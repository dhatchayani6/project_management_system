<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Developer;

class DeveloperController extends Controller
{
    //
    public function show()
    {
        return view('admin.developer');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bioid' => 'required|max:191',
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'designation' => 'required|max:191',
            'mobile' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $developer = new Developer;
            $developer->bioid = $request->input('bioid');
            $developer->name = $request->input('name');
            $developer->email = $request->input('email');
            $developer->designation = $request->input('designation');
            $developer->mobile = $request->input('mobile');
            $developer->save();

            return response()->json([
                'status' => 200,
                'message' => 'Developer added successfully'
            ]);
        }
    }

    public function fetch(){
        $developer=Developer::all();
        return response()->json([
            'developer'=>$developer,
        ]);
    }
}
