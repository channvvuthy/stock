<?php
use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => 'admin',
        'namespace' => '\App\Modules\login'
    ], function () {

        Route::get('/login', 'LoginController@index');
        Route::post('/login', 'LoginController@login');
    });