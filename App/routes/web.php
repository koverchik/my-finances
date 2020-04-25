<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/outlay', function () {
    return view('auth.table.outlay');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/outlay-save', 'OutlaySaveController@saveOutlay')->name('outlaySave');
