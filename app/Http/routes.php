<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Game;

Route::get('/', function () {
    $game = Game::orderBy('price','ASC')->limit(3)->get();
    return view('welcome',compact('game'));
});
//Profile
Route::post('/updated/images/{id}','UserController@updateProfile')->name('updateProfile');
//HOME
Route::get('/home/game/{id}','WebController@detailGame')->name('detail.game');
Route::get('/add-to-cart/{id}','UserController@getAddToCart')->name('gettocart');
Route::get('/shoppingCart','UserController@shoppingCart')->name('cart');
Route::get('/All-Product','UserController@allProduct')->name('product');
Route::get('/Checkout','UserController@checkOut')->name('checkout');
Route::post('/Checkout/store','UserController@storeCheckout')->name('store.Checkout');
Route::get('/MyGames/{id}','UserController@myGames')->name('mygames');
Route::post('/MyGames/Rate','UserController@rateGames')->name('rating');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/profile','UserController@profile')->name('profile');
Route::get('/ManageGame','AdminController@manageGame')->name('manageGame');
Route::get('/ManageUser','AdminController@manageUser')->name('manageUser');
Route::get('/ManageGenre','AdminController@manageGenre')->name('manageGenre');
Route::get('/ManageTransaction','AdminController@manageTransaction')->name('transactionHistory');
Route::get('/Delete/Transaction/{id}','AdminController@deleteTransaction')->name('deleteTransaction');
//Manage GET
Route::get('/TambahGame','AdminController@tambahGame')->name('tambahGame');
Route::get('/TambahGenre','AdminController@tambahGenre')->name('tambahGenre');
Route::get('/TambahUser','AdminController@tambahUser')->name('tambahUser');
//POST
Route::post('/Genre/Store','AdminController@storeGenre')->name('genre.store');
Route::post('/Game/Store','AdminController@storeGame')->name('game.store');
Route::post('/User/Store','AdminController@storeUser')->name('user.store');
//DELETE
Route::get('/User/Delete/{id}','AdminController@deleteUser')->name('delete.user');
Route::get('/Genre/Delete/{id}','AdminController@deleteGenre')->name('delete.genre');
Route::get('/Game/Delete/{id}','AdminController@deleteGame')->name('delete.game');
//EDIT
Route::get('/User/Edit/{id}','AdminController@editUser')->name('edit.user');
Route::post('/User/Edit/Update/{id}','AdminController@updateUser')->name('update.user');
Route::get('/Genre/Edit/{id}','AdminController@editGenre')->name('edit.genre');
Route::post('/Genre/Edit/Update/{id}','AdminController@updateGenre')->name('update.genre');
Route::get('/Game/Edit/{id}','AdminController@editGame')->name('edit.game');
Route::post('/Game/Edit/Update/{id}','AdminController@updateGame')->name('update.game');