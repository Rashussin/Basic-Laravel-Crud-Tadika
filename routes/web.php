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

Route::get('/pelajar', 'PelajarController@index');
Route::post('/pelajar/create', 'PelajarController@create');
Route::get('/pelajar/{id}/edit', 'PelajarController@edit');
Route::post('/pelajar/{id}/update','PelajarController@update');
Route::get('/pelajar/{id}/delete', 'PelajarController@delete');

Route::get('/testingvueweb', 'TestingController@index');