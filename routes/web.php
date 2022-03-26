<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::post('/register', 'HomeController@register')->name('front.register');
Route::post('/login', 'HomeController@login')->name('front.login');
Route::get('/logout', 'HomeController@logout')->name('front.logout');
Route::get('/exercise/{id}', 'HomeController@exercise')->name('front.exercise');


Route::get('/check', 'HomeController@check')->name('front.check');



