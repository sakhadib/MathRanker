<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem as Prob;
use App\Models\tags;
use App\Models\Attempts;
use App\Models\solver;
use Carbon\Carbon;

class indProb_controller extends Controller
{
    public function index($pid)
    {
        $Prob = Prob::where('id', $pid)->first();
        $TotalAttempts = Attempts::where('p_id', $pid)->count();
        $myAttCount = Attempts::where('p_id', $pid)->where('uname', session('uname'))->count();
        $SuccessCount = Attempts::where('p_id', $pid)->where('verdict', 1)->count();
        $gainedxp = $this->gainedXP($pid, session('uname'));
        $availableXP = $this->getAvailableXP($pid, $Prob->max_xp, session('uname'));
        $status = $this->getStatus($availableXP, $Prob->max_xp);

        $gainedxp = round($gainedxp, 2);
        $availableXP = round($availableXP, 2);

        if($Prob){
            $created = $Prob->created_at->format('d-M-Y');
            $tags = tags::where('p_id', $pid)->pluck('tag_name')->toArray();
            return view('fe/individualProb', 
                [
                    'Prob' => $Prob, 
                    'pid' => $pid, 
                    'created' => $created,
                    'tags' => $tags,
                    'TotalAttempts' => $TotalAttempts,
                    'SuccessCount' => $SuccessCount,
                    'myAttCount' => $myAttCount,
                    'gainedxp' => $gainedxp,
                    'status' => $status,
                    'availableXP' => $availableXP
                ]
            );
        }
        else{
            return redirect('/')->with('error', 'Problem not found.');
        }
    }

    public function submit($pid, Request $request)
    {
        if(session('uname') == null){
            // die(session('uname'));
            return redirect('/login')->with('error', 'Please login to submit your answer.');
        }

        $Prob = Prob::where('id', $pid)->first();
        

        try{
            $request->validate([
                'sub_ans' => 'required|numeric',
            ]);
        }
        catch(\Exception $e){
            return redirect('/problem/'.$pid)->with('error', 'Submission failed. Please enter a valid number.');
        }

        if($Prob){
            $uname = session('uname');
            $verdict = $this->getCheck($Prob, (double)$request['sub_ans']);
            
            if($verdict == 1){
                $xp = $this->getAvailableXP($pid, $Prob->max_xp, session('uname'));
            }
            else{
                $xp = 0;
            }

            $attempt = new Attempts;
            $attempt->uname = $uname;
            $attempt->p_id = $pid;
            $attempt->verdict = $verdict;
            // $attempt->penalty = $this->calculatePenalty($pid, $uname);
            $attempt->penalty = 0;
            $attempt->xp = $xp;
            $attempt->save();

            $Solver = solver::where('uname', $uname)->first();
            $Solver->xp += $xp;
            $Solver->save();

            return redirect('/problem/'.$pid)->with('success', 'Submission successful.');
        }
        else{
            return redirect('/')->with('error', 'Problem not found.');
        }
    }

    // private function calculatePenalty($pid, $uname){
    //     // Retrieve the current time
    //     $current_time = Carbon::now();

    //     // Retrieve contest times and verdict from database or configuration
    //     $contest_start_time = Carbon::parse(config('contest.start_time')); // Assuming the contest start time is stored in the config
    //     $contest_end_time = Carbon::parse(config('contest.end_time')); // Assuming the contest end time is stored in the config
    //     $verdict = Attempts::where('p_id', $pid)->where('uname', $uname)->first()->verdict;

    //     // Check if the current time is within the contest period
    //     if ($current_time->between($contest_start_time, $contest_end_time)) {
    //         // Check the verdict
    //         if ($verdict == 1) {
    //             // Calculate the penalty in minutes
    //             $penalty = $current_time->diffInMinutes($contest_start_time);
    //             return $penalty;
    //         }
    //     }

    //     // Return 0 if current time is outside contest period or verdict is not 1
    //     return 0; 
    // }


    // ? Have Later work on this
    private function getCheck($Prob, $submitted_ans){
        if(abs($Prob->answer - $submitted_ans)<=0.01){
            return 1;
        }
        else{
            return 0;
        }
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

    private function gainedXP($pid, $uname){
        $CorrectAtt = Attempts::where('p_id', $pid)->where('verdict', 1)->where('uname', $uname)->first();
        if($CorrectAtt == null){
            return 0;
        }
        return $CorrectAtt->xp;
    }
}
