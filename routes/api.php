<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List Users
Route::get('users', 'UsersController@index');

// List Single User
Route::get('users/{id}', 'UsersController@show');

// Create New User
Route::post('users', 'UsersController@store');

// Update the User
Route::put('users', 'UsersController@store');

// Delete the User
Route::delete('users/{id}', 'UsersController@destroy');