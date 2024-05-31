<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class leaderboard_controller extends Controller
{
    public function index()
    {
        $uname = session('uname');
        if(!$uname)
        {
            return redirect('/login');
        }

        
        return view('fe.leaderboard');
    }
}
