<?php
use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => 'admin',
        'namespace' => '\\App\\Modules\\Auth'
    ], function () {

        Route::get('/login', 'AuthController@index');
        Route::post('/login', 'AuthController@login');
        Route::get('/register', 'AuthController@register');
        Route::post('/register', 'AuthController@register');
        Route::get('/password/reset', 'ForgotPasswordController@index');
    });