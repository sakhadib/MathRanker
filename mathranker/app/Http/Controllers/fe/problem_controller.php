<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prob;
use App\Models\tags;

class problem_controller extends Controller
{
    public function index($pid)
    {
        $Prob = Prob::where('p_id', $pid)->first();
        if($Prob){
            $created = $Prob->created_at->format('d-M-Y');
            $tags = tags::where('p_id', $pid)->pluck('tag_name')->toArray();
            return view('fe/individualProb', 
                [
                    'Prob' => $Prob, 
                    'pid' => $pid, 
                    'created' => $created,
                    'tags' => $tags
                ]
            );
        }
        else{
            return redirect('/')->with('error', 'Problem not found.');
        }
    }
    
}
