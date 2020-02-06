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
    return view('frontMain');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


// Ressources "manuelle"
Route::post('plat/addToMenu', 'PlatsController@addToMenu')->name('plat.addToMenu');

Route::post('plat/removeFromMenu/{menu}/{plat}', 'PlatsController@removeFromMenu')->name('plat.removeFromMenu');

// Reservations
Route::get('reservation/valider/{id}', 'ReservationController@validerReservation')->name('reservation.validerReservation');

Route::get('reservation/refuser/{id}', 'ReservationController@refuserReservation')->name('reservation.refuserReservation');


// Ressources
Route::resource('plat', 'PlatsController');

Route::resource('boisson', 'BoissonController');

Route::resource('menu', 'MenuController');

Route::resource('affiche', 'AfficheController')->only([
    'index', 'create', 'store', 'destroy'
]);

Route::resource('photo', 'PhotosController')->only([
    'index', 'update', 'store', 'destroy'
]);


Route::resource('reservation', 'ReservationController');
Route::resource('client', 'ClientController');

