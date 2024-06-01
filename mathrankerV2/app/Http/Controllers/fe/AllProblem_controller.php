<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Attempts;

class AllProblem_controller extends Controller
{
    public function index()
    {        
        // Retrieve all problems
        $Prob_array = Problem::all();

        // Initialize an array to store modified objects
        $modifiedProbArray = [];

        // Iterate through each problem
        foreach ($Prob_array as $prob) {
            // Count successful attempts for the current problem
            $successCount = Attempts::where('p_id', $prob->id)->where('verdict', 1)->count();

            // Check if the current session user has any successful attempt for the current problem
            $availableXP = $this->getAvailableXP($prob->id, $prob->max_xp, session('uname'));
            $status = $this->getStatus($availableXP, $prob->max_xp);

            // Create a new object with problem details, success count, and user success flag
            $modifiedProb = (object) [
                'prob' => $prob,
                'ct' => $successCount,
                'availableXP' => $availableXP,
                'status' => $status
            ];

            // Add the modified object to the array
            $modifiedProbArray[] = $modifiedProb;
        }

        // Pass the modified array to the view
        return view('fe.problems', ['modifiedProbArray' => $modifiedProbArray]);
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
