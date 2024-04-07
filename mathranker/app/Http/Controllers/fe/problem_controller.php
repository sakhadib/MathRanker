<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prob;
use App\Models\tags;
use App\Models\Attempts;
use PhpParser\Node\Expr\AssignOp\Mod;

class problem_controller extends Controller
{
    public function index($pid)
    {
        $Prob = Prob::where('p_id', $pid)->first();
        $TotalAttempts = Attempts::where('p_id', $pid)->count();
        $myAttCount = Attempts::where('p_id', $pid)->where('uname', session('uname'))->count();
        $SuccessCount = Attempts::where('p_id', $pid)->where('verdict', 1)->count();
        $gainedxp = $this->gainedXP($pid, session('uname'));
        $availableXP = $this->getAvailableXP($pid, $Prob->max_xp, session('uname'));
        $status = $this->getStatus($availableXP, $Prob->max_xp);

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

        $Prob = Prob::where('p_id', $pid)->first();
        

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
            $attempt->xp = $xp;
            $attempt->save();
            return redirect('/problem/'.$pid)->with('success', 'Submission successful.');
        }
        else{
            return redirect('/')->with('error', 'Problem not found.');
        }
    }



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
