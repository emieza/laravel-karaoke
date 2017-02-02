<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Llista;
use App\Tema;

class LlistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $llistes = Llista::all();
        return view('llista.index')->with("llistes",$llistes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('llista.crea');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if( $request->has("titol") && $request->has("lloc")
            && $request->has("organitzador") && $request->has("email")
            && $request->has("email2")
        ) {
            // hi son tots els camps
            if( $request->email != $request->email2 )
                return ("els correus no coincideixen :(");
            // tot ok, avanti
            $llista = new Llista();
            $llista->titol = $request->titol;
            $llista->lloc = $request->lloc;
            $llista->organitzador = $request->organitzador;
            $llista->comentaris = $request->comentaris;
            $llista->email = $request->email;
            $llista->save();
            return ("<a href='/llista/".$llista->id."'>OK. ID llista=".$llista->id." :)</a>");
        } else
            // falten dades
            return redirect('/llista/crea');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $llista = Llista::find($id);
        $cua = Tema::all();
        $fets = Tema::all();
        return view("llista.mostra", array("llista"=>$llista,
            "cua"=>$cua, "fets"=>$fets ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // 
    public function cerca(Request $request) {
        //
        $llistes = Llista::where( "titol", "like", "%".$request->cercatext."%" )->get();
        return view('llista.index', array("llistes"=>$llistes,
                    "cercatext"=>$request->cercatext) );
    }
}
