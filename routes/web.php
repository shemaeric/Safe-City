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

Route::get('/', 'HelpCentersController@index');
Route::post('/signup', 'RegisterUser@store');
Route::get('/verify','VerifyController@getVerify')->name('getVerify');
Route::post('/verify-account', 'VerifyController@postVerify')->name('postVerify');
Route::get('/login','LoginController@show');
Route::post('/login-user','LoginController@store');
Route::get('/near','EmergenciesController@shortestCenter');


Route::get('/see',function(){
   return view('helpSeeker');
});

Route::group(['middleware' => ['isAuthorised','isAdmin']], function () {
    Route::get('/manage','HelpCentersController@show');
    Route::get('/activate/{id}','HelpCentersController@activate');
    Route::get('/blocked/{id}','HelpCentersController@blocked');
});
Route::group(['middleware' => ['isAuthorised']], function () {
    Route::fallback(function(){
        abort(404);
    });
    Route::get('/home',function(){
        return view('home');
    });
    Route::get('/urgent', 'EmergenciesController@showUrgents');
    Route::get('/accidents', 'EmergenciesController@showAccidents');
    Route::get('/fire', 'EmergenciesController@showFire');
    Route::get('/abuse', 'EmergenciesController@showAbuse');
    Route::get('/logout','LoginController@logout');
    Route::get('/details/{id}','EmergenciesController@details');
    Route::get('/approve/{id}','EmergenciesController@approve');


});
