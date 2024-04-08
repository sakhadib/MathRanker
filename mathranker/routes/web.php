<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fe\home_controller;
use App\Http\Controllers\fe\login_controller;
use App\Http\Controllers\fe\signup_controller;
use App\Http\Controllers\fe\profile_controller;
use App\Http\Controllers\fe\problem_controller;
use App\Http\Controllers\fe\prob_page_controller;
use App\Http\Controllers\fe\post_controller;
use App\Http\Controllers\fe\feed_controller;

Route::get('/', [home_controller::class, 'index']);
Route::get('/login', [login_controller::class, 'index']);
Route::post('/login', [login_controller::class, 'login']);
Route::get('/logout', [login_controller::class, 'logout']);
Route::get('/signup', [signup_controller::class, 'index']);
Route::post('/signup', [signup_controller::class, 'signup']);

Route::get('/profile/{uname}', [profile_controller::class, 'index']);

Route::get('/problem/{pid}', [problem_controller::class, 'index']);
Route::post('/problem/{pid}', [problem_controller::class, 'submit']);

Route::get('/problems', [prob_page_controller::class, 'index']);

Route::get('/post/{post_id}', [post_controller::class, 'index']);
Route::get('/newpost', [post_controller::class, 'create']);
Route::post('/post', [post_controller::class, 'store']);
Route::get('/post/{post_id}/up', [post_controller::class, 'upvote']);
Route::get('/post/{post_id}/down', [post_controller::class, 'downvote']);

Route::get('/comment/{comment_id}/delete', [post_controller::class, 'commentDelete']);
Route::post('/comment/submit', [post_controller::class, 'commentStore']);

Route::get('/feed', [feed_controller::class, 'index']);


