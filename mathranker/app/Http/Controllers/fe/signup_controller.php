<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class signup_controller extends Controller
{
    public function index()
    {
        return view('fe/signup');
    }

    public function signup(Request $request){

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'uname' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        echo "<pre>";
        print_r($request->all());
    }
}
