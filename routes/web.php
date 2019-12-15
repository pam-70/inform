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
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'AddstudentController@hom');
Route::get('exit',['as'=>'exit','uses'=>'AddstudentController@log']);
Route::post('/addsudent',['as'=>'addsudent','uses'=>'AddstudentController@addstudent'])->middleware('auth');
Route::get('/addsudent',['as'=>'addsudenthom','uses'=>'AddstudentController@hom'])->middleware('auth');

//Route::post('/addvopr',['as'=>'addvopr','uses'=>'AddVoprController@addvopr']);
//Route::get('/addvopr',['as'=>'addvoprshow','uses'=>'AddVoprController@show']);

Route::get('/execute',['as'=>'execute','uses'=>'ExecuteController@execute'])->middleware('auth');
//Route::post('/execute',['as'=>'execute','uses'=>'ExecuteController@execute'])->middleware('auth');

Route::get('pdf44','ExecuteController@generatePDF');

Route::get('vue','ExecuteController@vue');




//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
