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

Route::get('/register','TicketsController@index')->name('tickets.register');
Route::post('/create','TicketsController@create')->name('tickets.create');
Route::get('/list','TicketsController@list')->name('tickets.list');
Route::get('/edit/{id}','TicketsController@edit')->name('tickets.edit');
Route::get('/list/search','TicketsController@search')->name('tickets.search');
Route::delete('/{id}','TicketsController@destroy')->name('tickets.destroy');
Route::match(['put', 'patch'], '/{id}','TicketsController@update')->name('tickets.update');
Route::get('/list/priority/{value}','TicketsController@priority')->name('tickets.priority');
