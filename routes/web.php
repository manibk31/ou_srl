<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', array('as'=>'/','uses'=> 'AuthController@getSignUp'));
Route::post('/signup',array('as'=>'signup','uses'=>'AuthController@postSignUp'));
Route::post('/signin',array('as'=>'signin','uses'=>'AuthController@postSignIn'));
Route::get('/home', array('as'=>'home','uses'=> 'AuthController@getHome'));
