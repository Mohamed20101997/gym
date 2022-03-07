<?php

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth:admin'])->group(function(){

            Route::get('/','DashboardController@index')->name('index');

        }); //end of dashboard routes



    Route::group(['middleware'=>'guest:admin','prefix'=>'admin'], function () {

        Route::get('login', 'AuthController@getLogin')->name('getLogin');
        Route::post('login', 'AuthController@login')->name('login');

    });

