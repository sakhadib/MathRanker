<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contests;
use App\Models\Attempts;
use App\Models\Problem;
use App\Models\solver;

class leaderboard_controller extends Controller
{
    public function index()
    {
        

        
        return view('fe.leaderboard');
    }

    public function contestLeaderBoard($cid){
        $contest = Contests::where('id', $cid)->first();

        if(!$contest){
            return redirect('/contests');
        }

        $Problems = Problem::where('c_id', $cid)->get();

        $AttemptArray = Attempts::where('verdict', 1)
            ->where('penalty', '!=', 0)
            ->whereIn('p_id', $Problems->pluck('id'))
            ->distinct('uname')
            ->pluck('uname');
    
        $ModifiedAttemptArray = [];

        foreach($AttemptArray as $attempt){
            $user = $attempt;
            $solver = solver::where('uname', $user)->first();
            $SolveCount = Attempts::where('uname', $user)->where('verdict', 1)->count();
            $totalXP = Attempts::where('uname', $user)->where('verdict', 1)->sum('xp');
            $totalPenalty = Attempts::where('uname', $user)->where('verdict', 1)->sum('penalty');
            $totalAttempt = Attempts::where('uname', $user)->count();

            $rate = $this->Rank($solver->rating);

            $modifiedAttempt = (object) [
                'user' => $user,
                'SolveCount' => $SolveCount,
                'totalXP' => $totalXP,
                'totalPenalty' => $totalPenalty,
                'totalAttempt' => $totalAttempt,
                'rate' => $rate
            ];

            $ModifiedAttemptArray[] = $modifiedAttempt;
        }



        

        return view('fe.leaderboard',
            [
                'ModifiedAttemptArray' => $ModifiedAttemptArray,
                'contest' => $contest
            ]);
    }



    private function Rank($rating)
    {
        if($rating < 1000)
        {
            return 'Sergent';
        }
        else if($rating < 1200)
        {
            return 'Second Lieutenant';
        }
        else if($rating < 1400)
        {
            return 'First Lieutenant';
        }
        else if($rating < 1600)
        {
            return 'Captain';
        }
        else if($rating < 1800)
        {
            return 'Major';
        }
        else if($rating < 2000)
        {
            return 'Lieutenant Colonel';
        }
        else if($rating < 2200)
        {
            return 'Colonel';
        }
        else if($rating < 2300)
        {
            return 'Brigadier General';
        }
        else if($rating < 2700)
        {
            return 'Major General';
        }
        else if($rating < 3000)
        {
            return 'Lieutenant General';
        }
        else
        {
            return 'General';
        }
    }
}
