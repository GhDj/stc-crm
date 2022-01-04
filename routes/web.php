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

Route::group(['middleware' => 'role:agent', 'prefix' => 'agent/prospect', 'as' => 'agent.prospect.'], function () {
   Route::get('create', 'Agent\ProspectController@create')->name('create');
   Route::get('show/{id}', 'Agent\ProspectController@show')->name('show');
   Route::post('create', 'Agent\ProspectController@store')->name('store');
});


Route::group(['middleware' => 'role:manager', 'prefix' => 'manager/rdv', 'as' => 'manager.rdv.'], function () {
    Route::get('/', 'Manager\RdvController@index')->name('index');
    Route::get('/{id}', 'Manager\RdvController@show')->name('show');
});

Route::group(['middleware' => 'role:agent', 'prefix' => 'agent/rdv', 'as' => 'agent.rdv.'], function () {
    Route::get('/', 'Agent\RdvController@index')->name('index');
    Route::get('/{id}', 'Agent\RdvController@show')->name('show');
    Route::post('create', 'Agent\RdvController@store')->name('store');
});



Route::group(['middleware' => 'role:manager', 'prefix' => 'manager/prospect', 'as' => 'manager.prospect.'], function () {
    Route::get('/', 'Manager\ProspectController@index')->name('index');
    Route::get('/{id}', 'Manager\ProspectController@show')->name('show');
});
