<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    //
    public function show(){
        $developers=Developer::all();
        return view('admin.developer',compact('developers'));
    }


    public function developer_add(Request $request){
        $developer = new Developer();
        $developer->bioid = $request->bioid;
        $developer->name = $request->name;
        $developer->email = $request->email;
        $developer->designation = $request->designation;
        $developer->mobile_number = $request->mobile;
        $developer->save();
        return redirect()->back()->with('message', 'Developer added successfully!');

    }
}
