<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\NovaTarefaMail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TarefasExport;


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

        /*$id = auth()->user()->id;
        $nome = auth()->user()->name;
        $email = auth()->user()->email;

        echo "ID: $id Nome: $nome Email: $email esta logado";
        */
        $user_id = auth()->user()->id;
        $tarefas = Tarefa::where('user_id', $user_id)->paginate(10);
        return view('tarefa.index',['tarefas'=>$tarefas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //adicionando usuarios a tarefa
        $dados = $request->all('tarefa', 'data_limite_conclusao');
        $dados['user_id'] = auth()->user()->id;

        //dd($dados);
        //dd($request->all());
        //$tarefa = Tarefa::create($request->all()); //antes do user_id
        $tarefa = Tarefa::create($dados);
        
        //enviando email da nova tarefa criada pelo usuario logado
        $destinatario = auth()->user()->email;
        Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));
        return redirect()->route('tarefa.show',['tarefa'=>$tarefa->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        //dd($tarefa->getAttributes());
        return view('tarefa.show',['tarefa'=>$tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;
        if($tarefa->user_id == $user_id){
            return view('tarefa.edit',['tarefa'=>$tarefa]);
        }

        return view('acesso-negado');
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
        /*
        print_r($request->all());
        echo '<hr>';
        print_r($tarefa->getAttributes());
        */
        if(!$tarefa->user_id == auth()->user()->id){
            return view('acesso-negado');
        }

        $tarefa->update($request->all());
        return redirect()->route('tarefa.show',['tarefa'=>$tarefa->id]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //dd($tarefa);
        if(!$tarefa->user_id == auth()->user()->id){
            return view('acesso-negado');
        }

        $tarefa->delete();
        return redirect()->route('tarefa.index',['tarefa'=>$tarefa->id]);

    }

    public function exportacao($extensao){
        $nome_arquivo = 'lista_de_tarefa';

        if ($extensao == 'xlsx'){
            $nome_arquivo .='.'.$extensao;
        }else if ($extensao == 'csv'){
            $nome_arquivo .='.'.$extensao;
        }else{
            return redirect()->route('tarefa.index');
        }

        //return Excel::download(new TarefasExport, 'lista_de_tarefa.xlsx');
        return Excel::download(new TarefasExport, $nome_arquivo);
    }
}
