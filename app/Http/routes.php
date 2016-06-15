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

Route::group(['middleware' => 'web'], function() {

    Route::get('/', function () {
        return view('master');
    });

    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('/logout', function() {
        auth()->logout();
        return redirect('/auth/login');
    });
    // Registration routes
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    Route::group(['middleware' => 'auth'], function () {
        // Page routes...
        Route::get('explore', 'PageController@explore');
        Route::get('explore', 'CardsController@index');
        Route::get('explore/{card}', 'CardsController@show'); //single card preview
        Route::get('library', 'CardsController@library'); //library page
        Route::get('create', 'PageController@create'); //create page

        Route::put('explore', 'CardsController@store'); //create card
        Route::post('explore', 'MediaController@addLikes'); //like a card
        Route::post('explore/{card}', 'MediaController@addLikes'); //like a card in single view
        Route::put('explore/{card}', 'MediaController@addComments');

        Route::get('explore/{card}/edit', 'CardsController@edit'); //edit card
        Route::patch('explore/{card}', 'CardsController@update'); //update card
        Route::delete('explore/{card}', 'CardsController@destroy'); //delete card
    });

});