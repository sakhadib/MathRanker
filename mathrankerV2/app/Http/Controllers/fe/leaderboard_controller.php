<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contests;
use App\Models\Attempts;
use App\Models\Problem;
use App\Models\solver;
use App\Models\User;
use App\Models\Rating;

class leaderboard_controller extends Controller
{
    public function index()
    {
        $solvers = solver::orderBy('rating', 'desc')->get();
        $modifiedSolvers = [];
        foreach($solvers as $solver){
            $uname = $solver->username;
            if(Attempts::where('uname', $uname)->where('verdict', 1)->count() == 0){
                continue;
            }
            $SolveCount = Attempts::where('uname', $uname)->where('verdict', 1)->count();
            $totalXP = Attempts::where('uname', $uname)->where('verdict', 1)->sum('xp');
            $totalPenalty = Attempts::where('uname', $uname)->where('verdict', 1)->sum('penalty');
            $totalAttempt = Attempts::where('uname', $uname)->count();
            $rating = $solver->rating;
            $rate = $this->Rank($rating);

            $modifiedSolver = (object) [
                'uname' => $uname,
                'SolveCount' => $SolveCount,
                'totalXP' => $totalXP,
                'totalPenalty' => $totalPenalty,
                'totalAttempt' => $totalAttempt,
                'rate' => $rate,
                'rating' => $rating
            ];

            $modifiedSolvers[] = $modifiedSolver;

        }
        return view('fe.lb', ['modifiedsolvers' => $modifiedSolvers]);
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
            $SolveCount = Attempts::where('uname', $user)->whereIn('p_id', $Problems->pluck('id'))->where('verdict', 1)->count();
            $totalXP = Attempts::where('uname', $user)->whereIn('p_id', $Problems->pluck('id'))->where('verdict', 1)->sum('xp');
            $totalPenalty = Attempts::where('uname', $user)->whereIn('p_id', $Problems->pluck('id'))->where('verdict', 1)->sum('penalty');
            $totalAttempt = Attempts::where('uname', $user)->whereIn('p_id', $Problems->pluck('id'))->count();

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



    public function setRating($cid){
        $user = User::where('name', session('uname'))->first();
        if(!$user){
            return redirect('/login');
        }

        $Problems = Problem::where('c_id', $cid)->get();

        $AttemptArray = Attempts::where('verdict', 1)
            ->where('penalty', '!=', 0)
            ->whereIn('p_id', $Problems->pluck('id'))
            ->distinct('uname')
            ->pluck('uname');

        foreach($AttemptArray as $attempt){
            $user = $attempt;
            $totalXP = Attempts::where('uname', $user)->where('verdict', 1)->sum('xp');
            $maxPenalty = Attempts::where('uname', $user)->where('verdict', 1)->max('penalty');

            $ratingJ = $this->calculateRating($totalXP, $maxPenalty);

            $solver = solver::where('uname', $user)->first();
            $newRating = $solver->rating + $ratingJ;
            $solver->rating = $newRating;
            $solver->save();

            $rating = new Rating;
            $rating->uname = $user;
            $rating->c_id = $cid;
            $rating->rating = $ratingJ;
            $rating->save();
        }

        return redirect('/');

    }


    private function calculateRating($totalXP, $maxPenalty){
        $rating = $totalXP - $maxPenalty;

        return $rating;
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
