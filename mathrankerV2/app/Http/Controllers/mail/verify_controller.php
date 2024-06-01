<?php

namespace App\Http\Controllers\mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solver;

class verify_controller extends Controller
{
    public function index($uname)
    {
        $Solver = Solver::where('uname', $uname)->first();
        if($Solver->isVerified == "yes"){
            return redirect('/login');
        }
        return view('fe.verify', ['uname' => $uname]);
    }

    public function verify(Request $request, $uname)
    {
        $Solver = Solver::where('uname', $uname)->first();
        if($Solver){
            $OTP = $Solver->isVerified;
            if($request['code'] == $OTP){
                $Solver->isVerified = "yes";
                $Solver->save();
                return redirect('/login');
            }
            else{
                return redirect('/verification/'.$uname)->with('error', 'Invalid OTP');
            }
        }
        return redirect('/signup');
    }
}
