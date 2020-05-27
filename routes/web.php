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

Route::get('/', 'PagesController@index');

Route::get('/job', function () {
    return view('job.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PagesController@index');

Route::get('/jobs', 'PagesController@jobs')->middleware('auth');;

Route::get('/techs', 'PagesController@techs')->middleware('auth');;

Route::get('/job_log', 'PagesController@techs')->middleware('auth');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('job', 'JobsController')->middleware('auth');

Route::resource('technician', 'TechniciansController')->middleware('auth');

Route::resource('job_log', 'JobLogsController')->middleware('auth');

////////////////////////////////////////////////////////////////////////////////

Route::resource('user', 'UsersController')->middleware('auth');;