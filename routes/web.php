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


Route::get('/home','HomeController@index')->name('home');

Route::get('/dashboard','crudController@tableshow')->name('table');

//Getting data by id
Route::get('edit/{id}','crudController@GetById')->name('viewId');

//Updating Data By Id
Route::post('update/{id}','crudController@updated')->name('update');

//Inserting A Data
Route::post('/inserData','crudController@inserted')->name('create');

//Retrieving A data
Route::get('/retrieveData','crudController@retrieved')->name('retrieve');

//Deleting A data
Route::get('delete/{id}','crudController@deleted')->name('deleter');

