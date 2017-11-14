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

Route::get('/', 'WelcomeController@index');
Route::get('/teachers', 'TeacherController@index');
Route::get('/display', 'PagesController@display');
Route::get('/lang/{lang}{route?}', 'LangController@index');

Route::prefix('api/v1', function(){
    Route::get('/teacher/get/', 'TeacherController@get');
    Route::post('/teacher/post/{fname?}{mname?}{lname?}{phonenumber?}', 'TeacherController@post');
});
