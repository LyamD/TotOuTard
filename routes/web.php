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

Route::get('/test', function ()
{
    return view('test');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Ressources
Route::resource('plat', 'PlatsController');
Route::resource('affiche', 'AfficheController')->only([
    'create', 'store', 'destroy'
]);
Route::resource('boisson', 'BoissonController')->only([
    'create', 'store', 'edit', 'update'
]);
Route::resource('menu', 'MenuController')->only([
    'create', 'store', 'destroy'
]);

Route::resource('reservation', 'ReservationController');
Route::resource('client', 'ClientController');

// Ressources "manuelle"
Route::post('plat/addToMenu', 'PlatsController@addToMenu')->name('plat.addToMenu');

Route::post('plat/removeFromMenu/{menu}/{plat}', 'PlatsController@removeFromMenu')->name('plat.removeFromMenu');
