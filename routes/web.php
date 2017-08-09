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

$apiRoute = "/api/";

Route::get($apiRoute, function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () use ($apiRoute) {
    Route::get($apiRoute . 'home', 'HomeController@index')->name('home');
    Route::resource($apiRoute . 'mood', 'MoodController');
    Route::get($apiRoute . 'logout', 'UserController@logout');
});

Route::group(['middleware' => 'checkIfManager'], function () use ($apiRoute) {
    Route::resource($apiRoute . 'employee', 'EmployeeController');
    Route::post($apiRoute . 'new-department', 'EmployeeController@newDepartment');
    Route::post($apiRoute . 'changeDepartment', 'EmployeeController@changeDepartment');
    Route::post($apiRoute . 'destroy', 'EmployeeController@destroy');
});

Auth::routes();
Route::resource("$apiRoute/user", 'UserController');
Route::post($apiRoute . 'activity', 'VerificationController@activity');
Route::get("newToken", 'VerificationController@newToken');
Route::get($apiRoute . 'run', 'HomeController@run');
Route::post($apiRoute . 'create-password', 'EmployeeController@createPassword');


