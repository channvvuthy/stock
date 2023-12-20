<?php

use Illuminate\Support\Facades\Route;
use App\Helper\Helper;

Route::group(['prefix' => 'admin'], function () {
    Route::group(['namespace' => '\\App\\Modules\\Auth'], function () {
        Route::get('/login', 'AuthController@index')
            ->middleware('guest')
            ->name('login');

        Route::post('/login', 'AuthController@login');

        Route::get('/register', 'AuthController@showRegistrationForm');

        Route::post('/register', 'AuthController@register')->name('register');

        Route::get('/password/reset', 'ForgotPasswordController@index');
    });

    Route::group(['namespace' => '\\App\\Modules\\Dashboard'], function () {
        Route::get('/dashboard', 'DashboardController@index');
    });

    Route::group(['namespace' => '\\App\\Modules\\Product', 'middleware' => 'auth'], function () {
        Route::prefix('product')->group(function () {
            Helper::routeGenerator('ProductController');
        });

        Route::prefix('category')->group(function () {
            Helper::routeGenerator('CategoryController');
        });
    });
});

