<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index(){
        return view('home.home');
    }
    public function login(){
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
            if($usertype=="admin"){
                return view('admin.adminhome');
            }elseif($usertype=="developer"){
                return view('developer.developerhome');
            }elseif($usertype=="student"){
                return view('student.studenthome');
            }

            else{
                return redirect()->back();
            }

        }
    }
}
