<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TarefaController extends Controller
{
    //autentificação pelo controller
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        //autentificação pelo metodo
        if(auth()->check()){
            $id = auth()->user()->id;
            $nome = auth()->user()->name;
            $email = auth()->user()->email;
            echo "ID: $id Nome: $nome Email: $email esta logado";
        }else{
            echo 'Não esta logado';
        };
        
        //classe com os metodos estaticos
        if(Auth::check()){
            $id = Auth::user()->id;
            $nome = Auth::user()->name;
            $email = Auth::user()->email;
            echo "ID: $id Nome: $nome Email: $email esta logado";
        }else{
            echo 'Não esta logado';
        };*/

        $id = auth()->user()->id;
        $nome = auth()->user()->name;
        $email = auth()->user()->email;

        echo "ID: $id Nome: $nome Email: $email esta logado";

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
