<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class signup_controller extends Controller
{
    public function index()
    {
        return view('fe/signup');
    }
}
