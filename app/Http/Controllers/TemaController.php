<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Llista;
use App\Tema;
use App\Vot;

class TemaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $llista = Llista::find($id);
        return view('tema.crea',array("llista"=>$llista));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // processa creació
        if( $request->has("cantants") && $request->has("tema") &&
            $request->has("video") )
        {
            $tema = new Tema();
            $tema->cantants = $request->cantants;
            $tema->tema = $request->tema;
            $tema->video = $request->video;
            $tema->comentaris = "";
            if( $request->has("comentaris") )
                $tema->comentaris = $request->comentaris;
            $tema->fet = false;
            $tema->llista_id = $id;
            $tema->save();
            return redirect("/llista/$id");
        }
        // si arriba aqui es que falten dades
        return redirect("/llista/$id/crea");
    }


    /*
        -------------
        API Functions
        -------------
        Utilitzem funcions static per poder ser cridades
        sense instanciar un objecte controller
    */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return json with status, id and tema_id
     */
    static public function nvots($id)
    {
        //
        try {
            $nvots = Vot::where("tema_id",$id)->get()->count();
            return response()->json([
                        "status" => "OK",
                        "tema_id" => $id,
                        "nvots" => $nvots,
                    ]);
        } catch (Exception $e) {
            return response()->json([
                        "status" => "ERROR",
                        "message" => $e->getMessage()
                    ]);
        }
    }

    static public function fet($id)
    {
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
    }

    static public function vota(Request $request, $id) {
        try {
            $ip = $request->ip();
            $tema = Tema::find($id);
            // si ja esta votat aquest tema des d'aquesta ip no el deixem tornar a afegir
            $votat = Vot::where("tema_id",$id)->where("ip",$ip)->get()->count();
            if( $votat ) {
                $votat = Vot::where("tema_id",$id)->where("ip",$ip)->delete();
                $nvots = Vot::where("tema_id",$id)->get()->count();
                return response()->json([
                            "status" => "OK",
                            "vot" => false,
                            "nvots" => $nvots,
                            "message" => "Estat actual = NO votat"
                        ]);
            }
            // creem vot i l'afegim a la BD
            $vot = new Vot();
            $vot->tema_id = $tema->id;
            $vot->ip = $ip;
            $vot->comentaris = "";
            $vot->save();
            $nvots = Vot::where("tema_id",$id)->get()->count();
            return response()->json([
                        "status" => "OK",
                        "vot" => true,
                        "nvots" => $nvots,
                        "message" => "Estat actual = votat"
                    ]);
        } catch (Exception $e) {
            return response()->json([
                        "status" => "ERROR",
                        "message" => $e->getMessage()
                    ]);
        }
    }

}
