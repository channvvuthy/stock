<?php
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function () {
    Route::group(['namespace' => '\\App\\Modules\\Auth'], function () {
        Route::get('/login', 'AuthController@index')->middleware('guest');
        Route::post('/login', 'AuthController@login');
        Route::get('/register', 'AuthController@showRegistrationForm');
        Route::post('/register', 'AuthController@register')->name('register');
        Route::get('/password/reset', 'ForgotPasswordController@index');
    });

    Route::group(['namespace' => '\\App\\Modules\\Dashboard'], function () {
        Route::get('/dashboard', 'DashboardController@index');
    });

    Route::group(['namespace' => '\\App\\Modules\\Product', 'prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index');
    });
});

