<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solver;

class login_controller extends Controller
{
    public function index()
    {
        if(session('isLoggedIn')){
            return redirect('/problems');
        }
        return view('fe.login');
    }

    public function login(Request $request){
        $request->validate([
            'uname' => 'required',
            'password' => 'required'
        ]);

        $uname = $request['uname'];
        $password = md5($request['password']);

        $solver = Solver::where('uname', $uname)->where('password', $password)->first();

        if($solver){
            if($solver->isVerified != "yes"){
                return redirect('/verification/'.$uname);
            }
            session(['uname' => $uname]);
            session(['isLoggedIn' => true]);
            return redirect('/problems');
        }else{
            return redirect('/login')->with('error', 'Invalid username or password');
        }
    }

    public function logout(Request $request){
        $request->session()->forget('uname');
        $request->session()->forget('isLoggedIn');
        return redirect('/');
    }
}
