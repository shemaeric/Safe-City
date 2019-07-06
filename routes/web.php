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

Route::group(['middleware' => ['isAuthorised']], function () {
    Route::fallback(function(){
        abort(404);
    });
    Route::get('/home',function(){
        return view('home');
    });
    Route::get('/logout','LoginController@logout');
    Route::get('/manage','HelpCentersController@show');
    Route::get('/activate/{id}','HelpCentersController@activate');
    Route::get('/blocked/{id}','HelpCentersController@blocked');

});
