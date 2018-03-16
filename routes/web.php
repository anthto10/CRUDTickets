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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('register','TicketsController@index')->name('register');

Route::get('list','TicketsController@list')->name('list');

Route::post('createTicket','TicketsController@createTicket')->name('createTicket');