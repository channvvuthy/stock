<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::get('/login', function () {
        return view('admin.pages.components.login');
    });
});