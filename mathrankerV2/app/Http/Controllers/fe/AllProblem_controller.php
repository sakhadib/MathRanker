<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Attempts;
use App\Models\Contests;
use App\Models\ContestParticipate;

use Carbon\Carbon;

class AllProblem_controller extends Controller
{
    public function index()
    {
        // Retrieve all problems
        $Prob_array = Problem::all()->sortBy('created_at', SORT_REGULAR, true);

        $modifiedProbArray = [];




        foreach ($Prob_array as $prob) {
            
            $successCount = Attempts::where('p_id', $prob->id)->where('verdict', 1)->count();

            $availableXP = $this->getAvailableXP($prob->id, $prob->max_xp, session('uname'));
            $status = $this->getStatus($availableXP, $prob->max_xp);


            $modifiedProb = (object) [
                'prob' => $prob,
                'ct' => $successCount,
                'availableXP' => $availableXP,
                'status' => $status
            ];

            $contest = Contests::where('id', $prob->c_id)->first();
            $start_time = Carbon::parse($contest->end_time);
            $start_time = $start_time->subHours(6);
            if($start_time->isFuture()){
        
            }
            else{
                $modifiedProbArray[] = $modifiedProb;
            }
        }

        $contest_title = 'All Problems';

        $isContestPage = false;
        $end_Time = Carbon::now()->addHours(6);

        return view('fe.problems', [
            'modifiedProbArray' => $modifiedProbArray,
            'contest_title' => $contest_title,
            'isContestPage' => $isContestPage,
            'end_Time' => $end_Time
        ]);
    }


    public function contestProblems($cid){

        if(!session('uname')){
            return redirect('/login');
        }
        $contest = Contests::where('id', $cid)->first();

        if(!$contest){
            return redirect('/contests');
        }

        $end_Time = Carbon::parse($contest->end_time);
        $end_Time->subHours(6);
        $start_time = Carbon::parse($contest->start_time);
        $start_time->subHours(6);

        $isParticipating = ContestParticipate::where('contest_id', $cid)->where('uname', session('uname'))->exists();

        if(!$isParticipating && $end_Time->isFuture()){
            return redirect('/contests');
        }

        if($start_time->isFuture()){
            return redirect('/contests');
        }


        
        $Prob_array = Problem::where('c_id', $cid)->get();

        



        $contest_title = $contest->title;

        $modifiedProbArray = [];

        foreach ($Prob_array as $prob) {
            
            $successCount = Attempts::where('p_id', $prob->id)->where('verdict', 1)->count();

            $availableXP = $this->getAvailableXP($prob->id, $prob->max_xp, session('uname'));
            $status = $this->getStatus($availableXP, $prob->max_xp);


            $modifiedProb = (object) [
                'prob' => $prob,
                'ct' => $successCount,
                'availableXP' => $availableXP,
                'status' => $status
            ];

            $modifiedProbArray[] = $modifiedProb;
        }
        $contest_title_2 = $contest_title;
        $contest_title = "Contest: $contest_title";
        

        $isContestPage = true;

        return view('fe.problems', [
            'modifiedProbArray' => $modifiedProbArray,
            'contest_title' => $contest_title,
            'isContestPage' => $isContestPage,
            'end_Time' => $end_Time,
            'contest_title_2' => $contest_title_2,
            'contest' => $contest
        ]);


    }


    private function getAvailableXP($pid, $maxXP, $uname){
        $Wrong_att_count = Attempts::where('p_id', $pid)->where('verdict', 0)->where('uname', $uname)->count();
        $SuccessCount = Attempts::where('p_id', $pid)->where('verdict', 1)->where('uname', $uname)->count();
        if($SuccessCount > 0){
            return 0;
        }
        if($Wrong_att_count == 0){
            return $maxXP;
        }
        
        $xp = $maxXP * pow(1/$Wrong_att_count, 0.3);
        return $xp;
    }

    private function getStatus($availableXP, $max_xp){
        $status = '';
        if($availableXP == 0){
            $status = 1;
        }
        else if($availableXP > 0 && $availableXP < $max_xp){
            $status = 0;
        }
        else{
            $status = 2;
        }

        return $status;
    }
}
