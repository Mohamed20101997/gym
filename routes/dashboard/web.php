<?php

          Route::group(['middleware'=>'auth:admin'], function () {
            Route::get('/','DashboardController@index')->name('index');
            Route::post('logout','AuthController@logout')->name('logout');

        }); //end of dashboard routes



    Route::group(['middleware'=>'guest:admin'], function () {

        Route::get('login', 'AuthController@getLogin')->name('getLogin');
        Route::post('login', 'AuthController@login')->name('login');

    });

