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


Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::group(['prefix' => 'cont'], function () {
        Route::get('/dashboard', 'HomeController@cont')->name('dashboard');

        Route::get('/producator/creaza', 'RegisterController@createProducator')->name('cont.adauga.producator');
        Route::post('/producator/creaza', 'RegisterController@storeProducator');

        Route::get('/companie/creaza', 'RegisterController@createCompanie')->name('cont.adauga.companie');
        Route::post('/companie/creaza', 'RegisterController@storeCompanie');

        Route::get('/date-producator', 'ProducatorController@show')->name('cont.arata.producator');
        Route::get('/editeaza-producator', 'ProducatorController@edit')->name('cont.editeaza.producator');
        Route::post('/editeaza-producator', 'ProducatorController@update');

        Route::get('/json-producator', 'ProducatorController@getDataForm');

        Route::get('/date-companie', 'CompanieController@show')->name('cont.arata.companie');
        Route::get('/editeaza-companie', 'CompanieController@edit')->name('cont.editeaza.companie');

    });
});


Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('verified');

Auth::routes(['verify' => true]);
