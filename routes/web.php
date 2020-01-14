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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('plat', 'PlatsController')->only([
    'create', 'update', 'edit', 'store'
]);
Route::resource('affiche', 'AfficheController')->only([
    'create', 'store', 'destroy'
]);

Route::get('/home', 'HomeController@index')->name('home');
