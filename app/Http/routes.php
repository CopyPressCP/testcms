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
Route::group(['middleware' => ['web']], function(){

    Route::get('begin', function(){
        return redirect('/');
    });


    Route::get('/', 'PagesController@home');
    Route::get('/about', 'PagesController@about');

    Route::get('users','UsersController@index');

    Route::get('campaigns','CampaignsController@index');
    Route::post('campaigns/store','CampaignsController@store');


    //Route::get('clients/auto-complete','ClientsController@clients_auto_complete');

    Route::get('/clients_auto_complete',
        [
        'as' => '/clients_auto_complete',
        'uses' => 'ClientsController@clients_auto_complete'
        ]);

    Route::get('cards', 'CardsController@index');
    Route::get('cards/{card}', 'CardsController@show');

    Route::post('cards/{card}/notes', 'NotesController@store');

    Route::get('notes/{note}/edit', 'NotesController@edit');

    Route::patch('notes/{note}', 'NotesController@update');

    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/dashboard', 'HomeController@index');


});



