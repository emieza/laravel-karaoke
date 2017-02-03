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
    return view('home');
});

// Crea una nova llista de Karaoke
Route::get('/llista/crea', "LlistaController@create");
Route::post('/llista/crea', "LlistaController@store");

// Mostra llistes de Karaoke
Route::get('/llista', "LlistaController@index");
// Mostra els temes d'una llista
Route::get('/llista/{llista}', "LlistaController@show");
// administra llista
Route::get('/llista/{llista}/admin', "LlistaController@admin");

// Crea un nou item a una llista existent
Route::get('/llista/{id}/crea', "TemaController@create");
Route::post('/llista/{id}/crea', "TemaController@store");

// Vota tema: TODO: amb API??
Route::get('/vota/{tema}', function ($tema) {
    return view( 'vota', array("tema"=>$tema) );
});

Route::get('/cerca', function() {
	return redirect("/");
});

Route::post('/cerca', "LlistaController@cerca");

