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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'MainController@index')->name('index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/main', 'MainController@main')->name('main');
	Route::resource('jenis', 'JenisController', ['only' => ['index']]);
	Route::resource('satuan', 'SatuanController', ['only' => 'index']);

	Route::group(['prefix' => 'datatable', 'as' => 'datatable.'], function () {
		Route::post('jenis', 'JenisController@datatable')->name('jenis');
		Route::post('satuan', 'SatuanController@datatable')->name('satuan');
	});
});