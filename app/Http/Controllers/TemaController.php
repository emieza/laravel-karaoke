<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Llista;
use App\Tema;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
