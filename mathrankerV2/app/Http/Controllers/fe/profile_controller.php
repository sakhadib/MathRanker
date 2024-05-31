<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Solver;
use App\Models\Rating;
use App\Models\Post;
use App\Models\Attempts;

class profile_controller extends Controller
{
    public function index()
    {
        if(!session('uname'))
        {
            return redirect('/login');
        }
        $uname = session('uname');
        $solver = Solver::where('uname', $uname)->first();
        $maxrating = Rating::where('uname', $uname)->max('rating');
        $rank = $this->Rank($solver->rating);
        $maxrank = $this->Rank($maxrating);
        $postcount = Post::where('uname', $uname)->count();
        $correct= Attempts::where('uname', $uname)->where('verdict', 1)->count();
        $wrong= Attempts::where('uname', $uname)->where('verdict', 0)->count();
        
        $allContestRatings = $this->allContestRatings($uname);

        $contestCountArray = $this->printformZeroToTotalContests($uname);

        // $attempted = Attempts::where('uname', $uname)->count();

        // $attempted = Attempts::where('uname', $uname)
        //     ->distinct('problem_id') // Make the query distinct based on the problem_id column
        //     ->orderBy('created_at', 'desc')->get(); // Order by created_at in descending order

        $attempts = Attempts::where('attempts.uname', $uname)
            ->join('problems', 'attempts.p_id', '=', 'problems.id')
            ->select('problems.id','problems.title', 'attempts.verdict', 'attempts.created_at')
            ->orderBy('attempts.created_at', 'desc')
            ->get();
        
        return view('fe.profile',
        [
            'uname' => $uname,
            'solver' => $solver,
            'maxrating' => $maxrating,
            'rank' => $rank,
            'maxrank' => $maxrank,
            'postcount' => $postcount,
            'correct' => $correct,
            'wrong' => $wrong,
            'contestCountArray' => $contestCountArray,
            'allContestRatings' => $allContestRatings,
            'attempts' => $attempts
        ]);
    }

    public function profile($uname){
        if (session('uname')) {
            if (session('uname') == $uname) {
                return redirect('/profile');
            }
        }
        $solver = Solver::where('uname', $uname)->first();
        $maxrating = Rating::where('uname', $uname)->max('rating');
        $rank = $this->Rank($solver->rating);
        $maxrank = $this->Rank($maxrating);
        $postcount = Post::where('uname', $uname)->count();
        $correct= Attempts::where('uname', $uname)->where('verdict', 1)->count();
        $wrong= Attempts::where('uname', $uname)->where('verdict', 0)->count();
        
        $allContestRatings = $this->allContestRatings($uname);

        $contestCountArray = $this->printformZeroToTotalContests($uname);

        // $attempted = Attempts::where('uname', $uname)->count();

        // $attempted = Attempts::where('uname', $uname)
        //     ->distinct('problem_id') // Make the query distinct based on the problem_id column
        //     ->orderBy('created_at', 'desc')->get(); // Order by created_at in descending order

        $attempts = Attempts::where('attempts.uname', $uname)
            ->join('problems', 'attempts.p_id', '=', 'problems.id')
            ->select('problems.id','problems.title', 'attempts.verdict', 'attempts.created_at')
            ->orderBy('attempts.created_at', 'desc')
            ->get();
        
        return view('fe.profile',
        [
            'uname' => $uname,
            'solver' => $solver,
            'maxrating' => $maxrating,
            'rank' => $rank,
            'maxrank' => $maxrank,
            'postcount' => $postcount,
            'correct' => $correct,
            'wrong' => $wrong,
            'contestCountArray' => $contestCountArray,
            'allContestRatings' => $allContestRatings,
            'attempts' => $attempts
        ]);

    }

    private function allContestRatings($uname)
    {
        // Get all contest ratings for the given user
        $allContestRatings = Rating::where('uname', $uname)->get();

        // Extract ratings into an array
        $ratings = $allContestRatings->pluck('rating')->toArray();

        // Convert array to a comma-separated string
        $ratingArray = implode(', ', $ratings);

        return $ratingArray;
    }


    private function printformZeroToTotalContests($uname)
    {
        $contestcount = Rating::where('uname', $uname)->count();
        $form = '';
        for($i = 1; $i < $contestcount; $i++)
        {
            $form .= $i . ', ';
        }
        $form .= $contestcount;
        return $form;
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
