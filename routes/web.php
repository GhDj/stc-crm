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

//Route::get('/roles', 'PermissionController@Permission'); // Only on creation

Route::group(['middleware' => 'role:developer'], function() {

    Route::get('/admin', function() {

        return 'Welcome Admin';

    });

});

Route::group(['middleware' => 'role:agent', 'prefix' => 'prospect', 'as' => 'prospect.'], function () {
   Route::get('create', 'Agent\ProspectController@create')->name('create');
   Route::post('create', 'Agent\ProspectController@store')->name('store');
});
