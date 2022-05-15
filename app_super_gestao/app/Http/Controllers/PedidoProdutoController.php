<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;

class PedidoProdutoController extends Controller
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
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        //$pedido->produtos; //acionando o eager loading no N para N definido em Pedido
        return view('app.pedido_produto.create',['pedido'=>$pedido, 'produtos'=>$produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        /* teste 
        echo '<pre>';
        print_r($pedido->id);
        echo '</pre>';
        echo '<hr>';
        echo '<pre>';
        print_r($request->get('produto_id'));
        echo '</pre>';
        */
        $regra = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];

        $feedback = [
            'exists' => 'produto não encontrado na tabela',
            'required' => 'campo :attribute é obrigatorio'
        ];

        $request->validate($regra,$feedback);
        /*
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save();
        */

        //insert do relacionamento pelo metodo de belongsToMany do objeto Pedido
        /* $pedido->produtos  dessa forma de atributo eu retorno o relacionamento
        se informe o (), estou retorno o objeto
        attach(<id do produto>,) serve para fazer uma inserção no relacionamento*/
        $pedido->produtos()->attach(
            $request->get('produto_id'),
            ['quantidade'=> $request->get('quantidade')]
        );

        return redirect()->route('pedido-produto.create',['pedido'=>$pedido->id]);

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
    //public function destroy(Pedido $pedido, Produto $produto) //era sem a tratativa para não retirar relacionamento duplicado
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        /* teste
        print_r($pedido->getAttributes());
        echo '<hr>';
        print_r($produto->getAttributes());
        */

        /*
        //modo convencional
        PedidoProduto::where([
            'pedido_id'=>$pedido->id,
            'produto_id'=>$produto->id
        ])->delete();
        */

        /*
        //delete pelo relacionamento com o detach
        $pedido->produtos()->detach($produto->id);
        */

        $pedidoProduto->delete();

        //return redirect()->route('pedido-produto.create',['pedido'=>$pedido->id]);
        return redirect()->route('pedido-produto.create',['pedido'=>$pedido_id]);
    }
}
