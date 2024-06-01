<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\problem;
use App\Models\solver;
use App\Models\Contests;
use App\Models\Attempts;
use Illuminate\Support\Facades\DB;

class homeii_controller extends Controller
{
    public function index()
    {
        $solverct = Solver::count();
        $Problemct = Problem::count();
        $Contestsct = Contests::count();

        $Top_solver = Solver::orderBy('XP', 'desc')->take(3)->get();
        // $Top_solver = [];
        return view('fe.homeii',
        [
            'solverct' => $solverct,
            'Problemct' => $Problemct,
            'Contestsct' => $Contestsct,
            'Top_solver' => $Top_solver
        ]
    );
    }
}
