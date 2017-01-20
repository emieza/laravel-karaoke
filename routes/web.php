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

Route::get('/llista/crea', function () {
	return view('llista.crea');
});

Route::get('/llistes', function () {
	return view('llistes');
});

Route::get('/llista/{llista}', function ($llista) {
	return view( 'llista.mostra', array("llista"=>$llista) );
});

Route::get('/vota/{tema}', function ($tema) {
    return view( 'llista.vota', array("tema"=>$tema) );
});

