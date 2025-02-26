<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FormController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function welcome()
    {
        return view('welcome');
    }

    public function SignUp(Request $request){
        $firstname=$request->input("firstname");
        $lastname=$request->input("lastname");

        return view("welcome", ["firstname"=>$firstname,"lastname"=>$lastname]);
    }
}
