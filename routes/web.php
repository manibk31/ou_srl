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
Route::get('/signout',array('as'=>'signout','uses'=>'AuthController@signOut'));
Route::post('/update',array('as'=>'update','uses'=>'BasicDetailsController@postBasicDetails'));
Route::post('/updatedetails',array('as'=>'update_details','uses'=>'EditController@postEditContent'));
Route::post('/publication',array('as'=>'publication','uses'=>'EditController@handlePublication'));
Route::post('/nopublication',array('as'=>'publication_nil','uses'=>'EditController@postNewPublication'));
