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


Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::group(['prefix' => 'cont'], function () {
        // allowe only if user don't have producer data
        Route::group(['middleware' => ['producator.restrict']], function () {
            Route::get('/producator/creaza', 'RegisterController@createProducator')->name('cont.adauga.producator');
            Route::post('/producator/creaza', 'RegisterController@storeProducator');
        });

        // allowe only if user have producer data
        Route::group(['middleware' => ['producator']], function () {
            Route::get('/dashboard', 'HomeController@cont')->name('dashboard');
            Route::get('/setari', 'HomeController@showSettings')->name('cont.arata.settings');

            Route::get('/produse', 'ProduseController@index')->name('cont.arata.produse');
            
            Route::get('/json-producator', 'ProducatorController@getDataForm');
            Route::get('/date-producator', 'ProducatorController@show')->name('cont.arata.producator');
            Route::get('/editeaza-producator', 'ProducatorController@edit')->name('cont.editeaza.producator');
            Route::post('/editeaza-producator', 'ProducatorController@update');
            
            // allowe access to company create routes only if user don't have company
            Route::group(['middleware' => ['companie.restrict']], function () {
                Route::post('/companie/creaza', 'RegisterController@storeCompanie');
                Route::get('/companie/creaza', 'RegisterController@createCompanie')->name('cont.adauga.companie');
            });
            
            // allowe access to company show/edit routes only if user have company
            Route::group(['middleware' => ['companie']], function () {
                Route::get('/json-companie', 'CompanieController@getDataForm');
                Route::get('/date-companie', 'CompanieController@show')->name('cont.arata.companie');
                Route::get('/editeaza-companie', 'CompanieController@edit')->name('cont.editeaza.companie');
                Route::post('/editeaza-companie', 'CompanieController@update');
            });
            
        });

    });
});


// Auth::routes(['verify' => true]);
Auth::routes();
