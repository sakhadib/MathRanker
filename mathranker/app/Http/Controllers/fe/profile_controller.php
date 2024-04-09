<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solver;
use APP\Models\role;
use App\Models\Attempts;
use App\Models\Posts;
use App\Models\Prob;

class profile_controller extends Controller
{
    public function index($uname)
    {
        $solver = Solver::where('uname', $uname)->first();
        if($solver){
            $profile_created = $solver->created_at->format('d-M-Y');
            return view('fe/profile', 
                [
                    'solver' => $solver, 
                    'uname' => $uname, 
                    'profile_created' => $profile_created
                ]
            );
        }
        else{
            return redirect('/')->with('error', 'Solver not found.');
        }
    }

    public function myProfile()
    {
        $uname = session('uname');
        $solver = Solver::where('uname', $uname)->first();
        $XP = Attempts::where('uname', $uname)->sum('xp');
        $PostCount = Posts::where('uname', $uname)->count(); 

        $AC = Attempts::where('uname', $uname)->where('verdict', 1)->count();
        $WA = Attempts::where('uname', $uname)->where('verdict', 0)->count();

        $Attempted_Problems = Attempts::leftJoin('prob', 'Attempts.p_id', '=', 'prob.p_id')
                                    ->where('uname', $uname)
                                    ->get();
        if($solver){
            $profile_created = $solver->created_at->format('d-M-Y');
            return view('fe/profile', 
                [
                    'solver' => $solver, 
                    'uname' => $uname, 
                    'profile_created' => $profile_created,
                    'XP' => $XP,
                    'AC' => $AC,
                    'WA' => $WA,
                    'Attempted_Problems' => $Attempted_Problems,
                    'PostCount' => $PostCount
                ]
            );
        }
        else{
            return redirect('/')->with('error', 'Solver not found.');
        }
    }
}
