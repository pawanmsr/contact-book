<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

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

// ---- User Routes ---- //

Route::get('/home', 'HomeController@index')->name('home')->middleware('user');

Route::post('/home/import', 'HomeController@import')->name('userimport')->middleware('user');

Route::get('/home/edit/{id}', 'HomeController@edit')->name('useredit')->middleware('user');

Route::post('/home/edit/update/{id}', 'HomeController@update')->name('userupdate')->middleware(('user'));

Route::get('/home/add', 'HomeController@add')->name('useradd')->middleware('user');

Route::post('/home/add/store', 'HomeController@store')->name('userstore')->middleware('user');

Route::post('/home/remove/{id}', 'HomeController@remove')->name('userremove')->middleware('user');

// ---- Admin Routes ---- //

Route::get('/adminhome', 'AdminController@index')->name('adminhome')->middleware('admin');

Route::get('/adminusers', 'AdminController@users')->name('adminusers')->middleware('admin');

Route::get('/admincontacts', 'AdminController@contacts')->name('admincontacts')->middleware('admin');

Route::get('/admincontacts/edit/{id}', 'AdminController@editcontact')->name('admincontactsedit')->middleware('admin');

Route::post('/admincontacts/edit/update/{id}', 'AdminController@updatecontact')->name('admincontactsupdate')->middleware(('admin'));

Route::get('/admincontacts/add', 'AdminController@addcontact')->name('admincontactsadd')->middleware('admin');

Route::post('/admincontacts/add/store', 'AdminController@storecontact')->name('admincontactsstore')->middleware('admin');

Route::post('/admincontacts/remove/{id}', 'AdminController@removecontact')->name('admincontactsremove')->middleware('admin');

Route::get('/adminusers/add', 'AdminController@adduser')->name('adminusersadd')->middleware('admin');

Route::post('/adminusers/add/store', 'AdminController@storeuser')->name('adminusersstore')->middleware('admin');

Route::get('/adminusers/edit/{id}', 'AdminController@edituser')->name('adminusersedit')->middleware('admin');

Route::post('/adminusers/edit/update/{id}', 'AdminController@updateuser')->name('adminusersupdate')->middleware(('admin'));

Route::post('/adminusers/remove/{id}', 'AdminController@removeuser')->name('adminusersremove')->middleware('admin');

// ---- Moderator Routes ---- //

Route::get('/moderatorhome', 'ModeratorController@index')->name('moderatorhome')->middleware('moderator');
