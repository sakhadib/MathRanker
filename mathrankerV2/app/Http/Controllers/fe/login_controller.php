<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solver;

class login_controller extends Controller
{
    public function index()
    {
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
            session(['solver' => $solver]);
            return redirect('/dashboard');
        }else{
            return redirect('/login')->with('error', 'Invalid username or password');
        }
    }
}
