<?php

use Illuminate\Http\Request;

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
	try {
		$tema = Tema::find($id);
		if( $tema ) {
			$tema->fet = true;
			$tema->save();
			return response()->json([
					"status" => "OK",
					"fet" => true,
					"message" => "tema marcat com a fet"
				]);
		}
		return response()->json([
				"status" => "ERROR",
				"message" => "tema no trobat"
			]);
	}
	catch (Exception $e) {
		return response()->json([
					"status" => "ERROR",
					"message" => $e->getMessage()
				]);
	}
});


Route::get('/vota/{id}', function(Request $request, $id) {
	try {
		$ip = $request->ip();
		$tema = Tema::find($id);
		// si ja esta votat aquest tema des d'aquesta ip no el deixem tornar a afegir
		$nvots = Vot::where("tema_id",$id)->where("ip",$ip)->get()->count();
		if( $nvots ) {
			$vot = Vot::where("tema_id",$id)->where("ip",$ip)->delete();
			return response()->json([
						"status" => "OK",
						"vot" => false,
						"message" => "Estat actual = NO votat"
					]);
		}
		// creem vot i l'afegim a la BD
		$vot = new Vot();
		$vot->tema_id = $tema->id;
		$vot->ip = $ip;
		$vot->comentaris = "";
		$vot->save();
		return response()->json([
					"status" => "OK",
					"vot" => true,
					"message" => "Estat actual = votat"
				]);
	} catch (Exception $e) {
		return response()->json([
					"status" => "ERROR",
					"message" => $e->getMessage()
				]);
	}
});
