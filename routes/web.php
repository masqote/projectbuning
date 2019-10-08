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

// Route::get('/', function () {
//     return view('layouts.template');
// });

//UserController
Route::get('/', 'UserController@index'); // Dashboard
Route::get('/login', 'UserController@login'); // Template Login
Route::get('/register', 'UserController@register'); // Template Register
Route::post('/loginPost', 'UserController@loginPost'); // Handle Post Request from Login
Route::post('/registerPost', 'UserController@registerPost'); // Handle Post Request from Register
Route::get('/logout', 'UserController@logout'); // Logout Session

// DashboardController
Route::get('/profile', 'DashboardController@profile'); // Check Profile User
Route::post('/profileUpdate', 'DashboardController@profileUpdate'); // Update Profile User
Route::post('/resetPassword', 'DashboardController@resetPassword'); // Update Profile User

