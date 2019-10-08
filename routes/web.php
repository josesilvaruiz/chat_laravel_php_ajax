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


Auth::routes();

Route::get('/{search?}', 'HomeController@index')->name('home');
Route::get('/chat/{user_id?}', 'MensajeController@index')->name('chat');
Route::post('/chat/save', 'MensajeController@save')->name('chat.save');
Route::get('/user/configuracion', 'UserController@config')->name('user.config');
Route::post('/user/update', 'UserController@update')->name('user.update');

