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

Route::get('/', 'HomeController@index');
Route::get('/printpbill/{id}', 'Pbills\PbillsController@printpbill');

Route::get('/dashboard','Dashboard\DashboardController@index');  /*controller to dashboard */
Route::resource('items','Items\ItemsController');  /* sab lai route gardinxa sahi ho :D */
Route::post('/Items/loadFromExcel','Items\ItemsController@loadFromExcel');
Route::resource('pbills','Pbills\PbillsController');
Route::resource('debtors','Debtors\DebtorsController');
Route::resource('sbills','Sbills\SbillsController');
Route::resource('creditors','Creditors\CreditorsController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
