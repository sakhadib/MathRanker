<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solver;

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
            'uname' => 'required|unique:solver,uname',
            'inst' => 'required',
            'country' => 'required',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'password_confirmation' => 'required',
        ], [
            'uname.unique' => 'The username has already been taken.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);
    
        // If validation passes, proceed to save the new user
        $solver = new Solver;
        $solver->fname = $request['fname'];
        $solver->lname = $request['lname'];
        $solver->email = $request['email'];
        $solver->uname = $request['uname'];
        $solver->institution = $request['inst'];
        $solver->country = $request['country'];
        $solver->password = md5($request['password']);
        $solver->save();
    
        return redirect('/login');
    }
    
}
