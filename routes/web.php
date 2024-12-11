<?php

use Illuminate\Support\Facades\Route;

Route::get('/fpage', function () {
    return 'fpage';
});

Route::get('/path', function() { 
    return 'Hello World'; 
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/user/{id}', function($id) {
    return "User ID: $id";
});

Route::get('/blog/{blogId}', function ($blogId) {
    $title = request()->input('title', 'Default Title');
    $content = request()->input('content', 'Default Content');
    
    return "Blog ID: $blogId, Title: $title, Content: $content";
});

Route::get('/signin', function () {
    $data = [
        'title' => 'Login Page',
        'error' => session('error')
    ];
    return view('signin', $data);
});

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

Route::get('/signin', [UserController::class, 'showSignin']);
Route::post('/signin', [UserController::class, 'signin']);

Route::get('/signup', [UserController::class, 'showSignup']);
Route::post('/signup', [UserController::class, 'signup']);

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::get('/logout', [UserController::class, 'logout']);
