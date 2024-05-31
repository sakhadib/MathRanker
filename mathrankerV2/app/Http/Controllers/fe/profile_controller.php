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
        $uname = session('uname');
        $solver = Solver::where('uname', $uname)->first();
        $maxrating = Rating::where('uname', $uname)->max('rating');
        $rank = $this->Rank($solver->rating);
        $maxrank = $this->Rank($maxrating);
        $postcount = Post::where('uname', $uname)->count();
        $correct= Attempts::where('uname', $uname)->where('verdict', 1)->count();
        $wrong= Attempts::where('uname', $uname)->where('verdict', 0)->count();
        $contestcount = Rating::where('uname', $uname)->count();
    
        
        return view('fe.profile',
        [
            'uname' => $uname,
            'solver' => $solver,
            'maxrating' => $maxrating,
            'rank' => $rank,
            'maxrank' => $maxrank,
            'postcount' => $postcount,
            'correct' => $correct,
            'wrong' => $wrong
        ]);
    }

    private function printformZeroToTotalContests($contestcount)
    {
        $form = '';
        for($i = 1; $i <= $contestcount; $i++)
        {
            $form .= '<i class="fa fa-star" style="color: #FFD700;"></i>';
        }
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
