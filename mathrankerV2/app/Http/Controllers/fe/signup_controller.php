<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Solver;

class signup_controller extends Controller
{
    public function index()
    {
        return view('fe.signup');
    }

    public function signup(Request $request){

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'uname' => 'required|unique:solvers,uname',
            'inst' => 'required',
            'country' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ], [
            'uname.unique' => 'The username has already been taken.',
            'password.min' => 'The password must be at least 8 characters long.'
        ]);

        $OTP = $this->OTP();
    
        // If validation passes, proceed to save the new user
        $solvers = new Solver;
        $solvers->fname = $request['fname'];
        $solvers->lname = $request['lname'];
        $solvers->username = $request['uname'];
        $solvers->email = $request['email'];
        $solvers->uname = $request['uname'];
        $solvers->institution = $request['inst'];
        $solvers->country = $request['country'];
        $solvers->password = md5($request['password']);
        $solvers->isVerified = $OTP;
        $solvers->save();
    
        return redirect('/verify/'.$request['uname']);
    }

    private function OTP(){
        $RandomOTP = rand(100000,999999);
        return $RandomOTP;
    }
}
