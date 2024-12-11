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
