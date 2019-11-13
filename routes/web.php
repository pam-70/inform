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
Route::post('/addsudent',['as'=>'addsudent','uses'=>'AddstudentController@addstudent'])->middleware('auth');
Route::get('/addsudent',['as'=>'addsudent','uses'=>'AddstudentController@hom'])->middleware('auth');
//execute
Route::get('/execute',['as'=>'execute','uses'=>'ExecuteController@execute'])->middleware('auth');


Route::get('pdf44','ExecuteController@generatePDF');



