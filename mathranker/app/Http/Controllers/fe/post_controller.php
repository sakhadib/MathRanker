<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class post_controller extends Controller
{
    public function index()
    {
        return view('fe/post');
    }

    public function create()
    {
        return view('fe/indPost');
    }
}
