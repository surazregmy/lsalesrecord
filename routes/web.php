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
Route::get('/generatepdf/{id}', 'Pbills\PbillsController@generatePdf');

Route::get('/dashboard','Dashboard\DashboardController@index');  /*controller to dashboard */
Route::resource('items','Items\ItemsController');  /* sab lai route gardinxa sahi ho :D */
Route::post('/Items/loadFromExcel','Items\ItemsController@loadFromExcel');
Route::resource('pbills','Pbills\PbillsController');
Route::resource('debtors','Debtors\DebtorsController');
Route::resource('sbills','Sbills\SbillsController');
Route::resource('creditors','Creditors\CreditorsController');
Route::resource('prbills','Prbills\PrbillsController');
Route::resource('preceipts','Preceipts\PreceiptsController');
Route::resource('srbills','Srbills\SrbillsController');
Route::get('pbills/getPbillsOfDebtor/{id}','Pbills\PbillsController@getPbillsOfDebtor');
Route::get('prbills/getPrbillsOfDebtor/{id}','Prbills\PrbillsController@getPrbillsOfDebtor');
Route::get('preceipts/getPreceiptsOfDebtor/{id}','Preceipts\PreceiptsController@getPreceiptsOfDebtor');
Route::get('pledgers/prepareLedgerforDebtor/{id}','Pledgers\PledgersController@prepareLedgerforDebtor');
Route::POST('Debtors/saveNotes','Debtors\DebtorsController@saveNotes');
Route::POST('Creditors/saveNotes','Creditors\CreditorsController@saveNotes');
Route::GET('/createUser','Auth\UserController@createUser');
Route::POST('/saveUser','Auth\UserController@saveUser');
Route::GET('/editUser/{id}','Auth\UserController@editUser');
Route::POST('/updateUser','Auth\UserController@updateUser');
Route::GET('/listUser','Auth\UserController@listUser');
Route::DELETE('/deleteUser/{id}}','Auth\UserController@deleteUser');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
