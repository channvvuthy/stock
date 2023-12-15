<?php

use Illuminate\Support\Facades\Route;

// Include admin routes
Route::namespace('Admin')->group(function () {
    include __DIR__.'/admin.php';
});

Route::get('/', function () {
    return view('welcome');
});
