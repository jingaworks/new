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

Route::get('/f', function()
{
    $serie = 'CT';
    $numar = '01234567';
    $region = 'Constanta';
    $place = 'Targusor';
    $titular = 'Iliescu Anamaria Stefania';

    $img = Image::make(storage_path('app/base/atestat.jpg'));
    $img->text($serie, 530, 407, function($font) {
        $font->file(storage_path('app/base/EuropeanTypewriter.ttf'));
        $font->align('center');
        $font->valign('top');
        $font->size(45);
    });
    $img->text($numar, 725, 407, function($font) {
        $font->file(storage_path('app/base/EuropeanTypewriter.ttf'));
        $font->align('center');
        $font->valign('top');
        $font->size(45);
    });
    $img->text($place, 575, 270, function($font) {
        $font->file(storage_path('app/base/giconfl.ttf'));
        $font->align('center');
        $font->valign('top');
        $font->size(55);
    });
    $img->text($region, 925, 270, function($font) {
        $font->file(storage_path('app/base/giconfl.ttf'));
        $font->align('center');
        $font->valign('top');
        $font->size(55);
    });
    $img->text($titular, 800, 565, function($font) {
        $font->file(storage_path('app/base/giconfl.ttf'));
        $font->align('center');
        $font->valign('top');
        $font->size(50);
    });
    $img->text($region, 490, 615, function($font) {
        $font->file(storage_path('app/base/giconfl.ttf'));
        $font->align('center');
        $font->valign('top');
        $font->size(48);
    });
    $img->text($place, 875, 615, function($font) {
        $font->file(storage_path('app/base/giconfl.ttf'));
        $font->align('center');
        $font->valign('top');
        $font->size(48);
    });

    
    $img->text($titular, 340, 915, function($font) {
        $font->file(storage_path('app/base/giconfl.ttf'));
        $font->align('center');
        $font->valign('top');
        $font->size(48);
    });
    $img->text($region, 859, 915, function($font) {
        $font->file(storage_path('app/base/giconfl.ttf'));
        $font->align('center');
        $font->valign('top');
        $font->size(48);
    });
    $img->text($place, 1200, 915, function($font) {
        $font->file(storage_path('app/base/giconfl.ttf'));
        $font->align('center');
        $font->valign('top');
        $font->size(48);
    });

    return $img->response('jpg');
});

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::group(['prefix' => 'cont'], function () {

        Route::post('/producator/atestat', 'AtestatController@setAtestat')->name('cont.set.atestat.image');
        
        // allowe only if user don't have producer data
        Route::group(['middleware' => ['producator.restrict']], function () {
            Route::get('/producator/creaza', 'RegisterController@createProducator')->name('cont.adauga.producator');
            Route::post('/producator/creaza', 'RegisterController@storeProducator');
        });

        // allowe only if user have producer data
        Route::group(['middleware' => ['producator']], function () {
            Route::get('/dashboard', 'HomeController@cont')->name('dashboard');
            Route::get('/setari', 'HomeController@showSettings')->name('cont.settings.show');
            
            Route::get('/produse/adaugate', 'ProduseController@showOwn')->name('cont.settings.subcategory.show');

            Route::get('/produse_json', 'ProduseController@json');
            Route::post('/produse_json', 'ProduseController@syncProducts');
            Route::get('/produse', 'ProduseController@index')->name('cont.arata.produse');
            Route::get('/produse/creaza', 'ProduseController@create')->name('cont.adauga.produse');
            Route::post('/adauga-categorie', 'ProduseController@newCategory');
            Route::post('/adauga-produs', 'ProduseController@newSubcategory');
            Route::get('/editeaza-produse', 'ProduseController@edit')->name('cont.editeaza.produse');
            
            Route::get('/produse/editeaza-pagina/{slug}', 'ProduseController@updatePage')->name('cont.editeaza.pagina');
            Route::post('/produse/editeaza-pagina', 'ProduseController@storePage')->name('cont.editeaza.salveaza.pagina');
            
            Route::get('/json-producator', 'ProducatorController@getDataForm');
            Route::get('/date-producator', 'ProducatorController@show')->name('cont.arata.producator');
            Route::get('/editeaza-producator', 'ProducatorController@edit')->name('cont.editeaza.producator');
            Route::post('/editeaza-producator', 'ProducatorController@update');
            
            // allowe access to company create routes only if user don't have company data
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
