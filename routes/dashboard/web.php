<?php

          Route::group(['middleware'=>'auth:admin' ,'prefix'=>'dashboard'], function () {

            Route::get('/','DashboardController@index')->name('index');
            Route::post('logout','AuthController@logout')->name('logout');

            Route::resource('serialNumber', 'SerialNumberController')->except('show');
            Route::resource('client', 'ClientController')->except('show');

            Route::get('get_follow_up', 'ClientController@get_follow_up')->name('get_follow_up');

            Route::resource('product', 'ProductController')->except('show');
            Route::resource('category', 'CategoryController')->except('show');
            Route::resource('meal', 'MealController')->except('show');
            Route::resource('followUp', 'FollowUpController')->except('show');
            Route::resource('exercise', 'ExerciseController')->except('show');


        }); //end of dashboard routes



    Route::group(['middleware'=>'guest:admin','prefix'=>'dashboard'], function () {

        Route::get('login', 'AuthController@getLogin')->name('getLogin');
        Route::post('login', 'AuthController@login')->name('login');

    });

