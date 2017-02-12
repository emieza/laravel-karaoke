<?php

namespace App\Http\Controllers;

use App\Llista;
use App\Tema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class LlistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $llistes = Llista::all();
        if( Auth::check() ) {
            // logat: mostrem les pròpies llistes separades
            $email = Auth::user()->email;
            $mylists = Llista::where("email",$email)->get();
            return view('llista.index')->with("llistes",$llistes)
                    ->with("mylists",$mylists);
        }
        // no logat
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
            // Creem usuari sense pass (no pot entrar) per si vol entrar dp
            $user = User::where("email",$llista->email)->get()->count();
            if( !$user ) {
                $user = new User();
                $user->name = $llista->organitzador;
                $user->email = $llista->email;
                $user->password = "";
                $user->save();
            }

            // TODO: crear admin token per no piratejar la llista admin
            // enviem missatge per admin link
            Mail::send("emails.adminlink", [ 'llista' => $llista ],
                    function($m) use ($llista) {
                        $m->from("enric@jolgorio.tk" , "Jolgorio Karaokes");
                        $m->to($llista->email, $llista->organitzador);
                        $m->subject("Nova llista de karaoke: administració");
                    }
                );
            // TODO: enviar 2n email amb el link de la festa pels convidats
            return redirect('/llista/'.$llista->id);
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
        $cua = Tema::where("fet",false)->where("llista_id",$id)->get();
        $fets = Tema::where("fet",true)->where("llista_id",$id)->get();
        return view("llista.mostra", array("llista"=>$llista,
            "cua"=>$cua, "fets"=>$fets, "admin"=>false ));
    }

    public function admin($id)
    {
        //
        $llista = Llista::find($id);
        $cua = Tema::where("fet",false)->where("llista_id",$id)->get();
        $fets = Tema::where("fet",true)->where("llista_id",$id)->get();
        return view("llista.mostra", array("llista"=>$llista,
            "cua"=>$cua, "fets"=>$fets, "admin"=>true ));
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
