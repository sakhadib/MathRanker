<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fe\signup_controller;
use App\Http\Controllers\fe\login_controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Signup
Route::get('/signup', [signup_controller::class, 'index']);
Route::post('/signup', [signup_controller::class, 'signup']);

// Login
Route::get('/login', [login_controller::class, 'index']);
Route::post('/login', [login_controller::class, 'login']);

//Problems

