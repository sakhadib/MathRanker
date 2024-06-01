<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\fe\home_controller;
use App\Http\Controllers\fe\signup_controller;
use App\Http\Controllers\fe\login_controller;
use App\Http\Controllers\fe\Allproblem_controller;
use App\Http\Controllers\fe\indProb_controller;
use App\Http\Controllers\fe\Post_controller;
use App\Http\Controllers\fe\Feed_controller;
use App\Http\Controllers\fe\about_controller;
use App\Http\Controllers\fe\profile_controller;
use App\Http\Controllers\fe\leaderboard_controller;
use App\Http\Controllers\mail\mail_controller;
use App\Http\Controllers\mail\verify_controller;


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

// Home
Route::get('/', [home_controller::class, 'index']);

// Signup
Route::get('/signup', [signup_controller::class, 'index']);
Route::post('/signup', [signup_controller::class, 'signup']);
Route::get('/verify/{uname}', [mail_controller::class, 'index']);
Route::get('/verification/{uname}', [verify_controller::class, 'index']);
Route::post('/verification/{uname}', [verify_controller::class, 'verify']);

// Login
Route::get('/login', [login_controller::class, 'index']);
Route::post('/login', [login_controller::class, 'login']);

// Logout
Route::get('/logout', [login_controller::class, 'logout']);

//Problems
Route::get('/problems', [Allproblem_controller::class, 'index']);

// Individual Problem
Route::get('/problem/{pid}', [indProb_controller::class, 'index']);
Route::post('/problem/{pid}', [indProb_controller::class, 'submit']);

// Post
Route::get('/post/{post_id}', [post_controller::class, 'index']);
Route::get('/newpost', [post_controller::class, 'create']);
Route::post('/post', [post_controller::class, 'store']);
Route::get('/post/{post_id}/up', [post_controller::class, 'upvote']);
Route::get('/post/{post_id}/down', [post_controller::class, 'downvote']);

Route::get('/comment/{comment_id}/delete', [post_controller::class, 'commentDelete']);
Route::post('/comment/submit', [post_controller::class, 'commentStore']);

// Feed
Route::get('/feed', [Feed_controller::class, 'index']);
Route::post('/feed', [Feed_controller::class, 'search']);


//about
Route::get('/about', [about_controller::class, 'index']);

//profile
Route::get('/profile', [profile_controller::class, 'index']);
Route::get('/profile/{username}', [profile_controller::class, 'profile']);

// Leaderboard
Route::get('/leaderboard', [leaderboard_controller::class, 'index']);
Route::get('/leaderboard/{username}', [leaderboard_controller::class, 'profile']);


