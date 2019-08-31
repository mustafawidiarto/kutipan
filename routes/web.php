<?php


Route::group(['midleware' => 'auth'], function(){
    Route::resource('quotes', 'QuoteController', ['except' => ['index', 'show']]);
    Route::post('/quotes-comment/{quote}','QuoteCommentController@store')->name('comment');
    Route::get('/quotes-comment/{comment}/edit','QuoteCommentController@edit')->name('comment.edit');
    Route::put('/quotes-comment/{comment}','QuoteCommentController@update')->name('comment.update');
    Route::delete('/quotes-comment/{comment}/delete','QuoteCommentController@destroy')->name('comment.destroy');
});
Route::get('/profile/{id?}', 'HomeController@profile');
Route::resource('quotes', 'QuoteController', ['only' => ['index', 'show']]);

Route::get('/', function () {
    return redirect('/quotes');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/quotes/random', 'QuoteController@random')->name('quotes.random');

