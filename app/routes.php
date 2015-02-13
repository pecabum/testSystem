<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

//Main route    
Route::get('/', "HomeController@showWelcome");

// QUESTIONS ROUTES
Route::get('questions','QuestionController@index');
Route::get('questions/create',[
    'uses'=>'QuestionController@create',    
    'as'=>'questions.create'
]);

Route::post('questions','QuestionController@store');

Route::post('questions/{userId}','QuestionController@complete');


// USERS ROUTES
//Route::resource('users','UsersController');
Route::get('users','UsersController@index');

Route::post('users/login','UsersController@login');



// MODERATORS ROUTES
Route::get('cms','ModeratorController@index');
Route::post('cms/login','ModeratorController@login');



