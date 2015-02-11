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

//
Route::get('/', "HomeController@showWelcome");



Route::resource('questions','QuestionController');
//Route::get('users/{username}', 'UserController@show');

//Route::get('users', function() {
//
//    $users = User::all();
//
//    return View::make('users.index')->withUsers($users);
//    
//});

//Route::get('users/{username}', function($username) {
//
//    $user = User::whereUsername($username)->first();
//
//    return View::make('users.show')->withUser($user);
//    
//});
