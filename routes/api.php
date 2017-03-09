<?php

use Illuminate\Http\Request;

use App\Http\Controllers\TemaController;
use App\Tema;
use App\Vot;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');



Route::get('/fet/{id}', function($id) {
    return TemaController::fet( $id );
});

Route::get('/nvots/{id}', function(Request $request, $id) {
    return TemaController::nvots( $id );
});

Route::get('/vota/{id}', function(Request $request, $id) {
    return TemaController::vota( $request, $id );
});


