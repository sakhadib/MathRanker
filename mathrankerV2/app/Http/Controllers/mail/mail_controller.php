<?php

namespace App\Http\Controllers\mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\VerifyMail;
use App\Models\Solver;
use Illuminate\Support\Facades\Mail;

class mail_controller extends Controller
{
    public function index($uname)
    {
        $Solver = Solver::where('uname', $uname)->first();
        $body = $Solver->isVerified;
        
        if($body == "yes"){
            return redirect('/login');
        }
        
        $email = $Solver->email;               
        $mailData = [
            'title' => 'Mail from MathRanker',
            'body' => $body,
        ];

        Mail::to($email)->send(new VerifyMail($mailData));
        return redirect('/verification/' . $uname);
    }

    
        
}
