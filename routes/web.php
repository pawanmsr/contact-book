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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home/import', 'HomeController@import')->name('import');

Route::get('/edit/{id}', 'HomeController@edit')->name('edit');

Route::post('/edit/update/{id}', 'HomeController@update')->name('update');

Route::get('/add', 'HomeController@add')->name('add');

Route::post('/add/store', 'HomeController@store')->name('store');

Route::post('/home/remove/{id}', 'HomeController@remove')->name('remove');
