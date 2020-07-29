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
// Домашняя страница
Route::get('/home', 'HomeController@index')->name('home');
// ???
Route::post('home/outlay/save', 'OutlaySaveController@saveOutlay')->name('outlaySave');
//Список смет
Route::get('home/outlay/all/', 'OutlaySaveController@allOutlay')->name('outlays');
// Одна смета
Route::get('home/outlay/{id}', 'OutlaySaveController@outlayOne')->name('outlayOne');
// Обнавление сметы
Route::post('home/outlay/{id}/update', 'OutlaySaveController@outlayUpdate')->name('outlayUpdate');
// Удаление сметы
Route::get('home/outlay/{id}/delete', 'OutlaySaveController@outlayDelete')->name('outlayDelete');
//Обнавление полномочий
Route::post('home/outlay/{id}/powers', 'OutlaySaveController@outlayPowers')->name('outlayPowers');
//Поиск пользователя
Route::get('home/outlay/all/searchName', 'OutlaySaveController@searchName')->name('searchName');
//Сохранение пользователя
Route::post('home/outlay/all/searchName/{id}', 'OutlaySaveController@saveNameUser')->name('saveNameUser');
// Удаление пользователя
Route::post('home/outlay/all/deleteName/', 'OutlaySaveController@deleteName');
//Кошелек  редактирование
// Route::get('home/purse', 'PurseController@base');
//Создание нового кошелька
Route::post('home/purse', 'PurseController@newPurse')->name('newPurse');
