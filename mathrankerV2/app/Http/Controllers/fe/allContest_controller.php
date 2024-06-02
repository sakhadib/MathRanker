<?php

namespace App\Http\Controllers\fe;

use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contests;
use App\Models\solver;
use App\Models\ContestParticipate;

class allContest_controller extends Controller
{
    public function index()
    {
        $currentTime = Carbon::now()->addHours(6);

        $ContestArray = Contests::where('end_time', '>', $currentTime)->get();
        // $ContestArray = Contests::where('end_time', '>', $currentTime)->orderBy('end_time', 'asc')->get();
        // $ContestArray = Contests::All();

        $ModifiedContestArray = [];

        foreach($ContestArray as $contest){
            $action = $this->actionFoo($contest->id);
            $RegCount = ContestParticipate::where('contest_id', $contest->id)->count();
            // $StartTime = $contest->start_time;
            // $EndTime = $contest->end_time;

            $StartTime = Carbon::parse($contest->start_time)->format('F j, Y, g:i a');
            $EndTime = Carbon::parse($contest->end_time)->format('F j, Y, g:i a');

            $modfiedContest = (object) [
                'contest' => $contest,
                'action' => $action,
                'RegCount' => $RegCount,
                'StartTime' => $StartTime,
                'EndTime' => $EndTime
            ];

            $ModifiedContestArray[] = $modfiedContest;
        }
        
        $tag = 'Upcoming';
        $flag = 0;

        $closestContest = Contests::where('start_time', '>', $currentTime)->orderBy('start_time', 'asc')->first();
        if(!$closestContest){
            return view('fe.contests', [
                'ModifiedContestArray' => $ModifiedContestArray,
                'tag' => 'Upcoming',
                'flag' => 0,
                'ccflag' => 1,
            ]);
        }

        $closestContestStartTime = Carbon::parse($closestContest->start_time);
        
        return view('fe.contests', [
            'ModifiedContestArray' => $ModifiedContestArray,
            'tag' => $tag,
            'flag' => $flag,
            'ccflag' => 0,
            'closestContestStartTime' => $closestContestStartTime
        ]);
    }

    public function allcontest(){
        $currentTime = Carbon::now();

        // $ContestArray = Contests::where('end_time', '>', $currentTime)->get();
        $ContestArray = Contests::All();

        $ModifiedContestArray = [];

        foreach($ContestArray as $contest){
            $action = 5;
            $RegCount = ContestParticipate::where('contest_id', $contest->id)->count();
            // $StartTime = $contest->start_time;
            // $EndTime = $contest->end_time;

            $StartTime = Carbon::parse($contest->start_time)->format('F j, Y, g:i a');
            $EndTime = Carbon::parse($contest->end_time)->format('F j, Y, g:i a');

            $modfiedContest = (object) [
                'contest' => $contest,
                'action' => $action,
                'RegCount' => $RegCount,
                'StartTime' => $StartTime,
                'EndTime' => $EndTime
            ];

            $ModifiedContestArray[] = $modfiedContest;
        }
        
        $tag = 'All';
        $flag = 1;
        
        return view('fe.contests', [
            'ModifiedContestArray' => $ModifiedContestArray,
            'tag' => $tag,
            'flag' => $flag,
            'ccflag' => 1
        ]);
    }

    public function registerPage($contest_id){
        $contest = Contests::where('id', $contest_id)->first();

        if(!$contest){
            return redirect('/404');
        }

        $start_time = Carbon::parse($contest->start_time);

        if($start_time->isPast()){
            return redirect('/contests');
        }


        $Solver = solver::where('uname', session('uname'))->first();
        $isPartisipating = ContestParticipate::where('uname', session('uname'))->where('contest_id', $contest_id)->first();
        if($Solver){
            if($isPartisipating){
                return redirect('/contests');
            }
            else{
                return view('fe.registerContest', 
                [
                    'contest_id' => $contest_id,
                    'solver' => $Solver
                ]);
            }
        }
        else{
            return redirect('/contests');
        }
    }


    public function register(Request $request){
        $contest_id = $request->contest_id;
        $Solver = solver::where('uname', session('uname'))->first();
        $isPartisipating = ContestParticipate::where('uname', session('uname'))->where('contest_id', $contest_id)->first();
        if($Solver){
            if($isPartisipating){
                return redirect('/contests');
            }
            else{
                $newPartisipant = new ContestParticipate;
                $newPartisipant->uname = session('uname');
                $newPartisipant->contest_id = $contest_id;
                $newPartisipant->save();
                return redirect('/contests');
            }
        }
        else{
            return redirect('/contests');
        }
    }





    private function actionFoo($contest_id){
        $Solver = solver::where('uname', session('uname'))->first();
        $isPartisipating = ContestParticipate::where('uname', session('uname'))->where('contest_id', $contest_id)->first();
        if($Solver){
            if($isPartisipating){
                return 0;
            }
            else{
                return 1;
            }
        }
        else{
            return 2;
        }
    }
}
