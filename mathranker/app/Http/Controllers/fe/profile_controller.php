<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solver;
use APP\Models\role;

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
}
