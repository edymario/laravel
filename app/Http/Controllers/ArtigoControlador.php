<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artigo;

class ArtigoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $artigo;



    public function  __construct(){
        $this->artigo = $artigo = new Artigo();
    }

    public function index()
    {
        $artigos = $this->artigo->where('id_usuario',auth()->user()->id)->get();
        return view('artigo', compact(['artigos']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->artigo->id_usuario = $request->input('id_usu');
            $this->artigo->titulo = $request->input('titulo');
            $this->artigo->link = $request->input('page');
            $this->artigo->save();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->artigo->destroy($id);
        return redirect('artigo');
        //dd($id);
    }
}
