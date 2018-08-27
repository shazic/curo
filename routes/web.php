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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user-list', function(){
    return view('user-list')->with(['users' => App\User::all()]);
})->name('user.list');

Route::group(
    ['prefix'  => 'survey'], 
    function(){

        // Display all Surveys.
        Route::get('/', 'SurveyController@index')->name('surveys');

        // Submit a survey to assigned users.
        Route::post('/{survey}', 'SurveyController@store')->name('survey.store');
});