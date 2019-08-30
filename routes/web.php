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
    return redirect('/quotes');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/quotes/random', 'QuoteController@random')->name('quotes.random');
Route::resource('quotes', 'QuoteController', ['only' => ['index', 'show']]);

Route::group(['midleware' => 'auth'], function(){
    Route::get('/profile', 'HomeController@profile');
    Route::resource('quotes', 'QuoteController', ['except' => ['index', 'show']]);
});
