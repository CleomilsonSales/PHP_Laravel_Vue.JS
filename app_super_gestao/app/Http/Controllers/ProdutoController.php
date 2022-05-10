<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use App\Unidade;
use App\ProdutoDetalhe;
use App\Item;
use App\Fornecedor;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //with(['produtoDetalhe']) esse trecho serve para fazer o Eager Loading, que serve para carregar as relações mesmo antes de serem usadas 
        $produtos = Produto::with(['produtoDetalhe','fornecedor'])->paginate(10); 
        //quando o nome do objeto não esta igual ao nome da tabela e o laravel não encontra
        //$produtos = Item::paginate(10); 

        /*
        //eloquent ORM na mão para fazer o hasOne que criar relação mestre detalhe
        //no eloquent ORM é criado um metodo no modelo Produto
        foreach($produtos as $key => $produto){
            //print_r($produto->getAttributes());
            //echo '<br><br>';

            $produtoDetalhe = ProdutoDetalhe::where('produto_id',$produto->id)->first();
            if(isset($produtoDetalhe)){
                //print_r($produtoDetalhe->getAttributes());

                //alterando o array original que monta a view
                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
                $produtos[$key]['altura'] = $produtoDetalhe->altura;

            }
            //echo '<hr>';
        }   */

        return view('app.produto.index',['produtos' => $produtos,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create',['unidades'=>$unidades,'fornecedores'=>$fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regra = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id', //verificando se a chave estrageira existe: exists:<table>,<column>
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'Campo obrigatorio',
            'min' => 'Informa no minimo 3 caracteres',
            'nome.max' => 'Informa no maximo 40 caracteres',
            'descricao.max' => 'Informa no maximo 2000 caracteres',
            'integer' => 'Campo deve ser inteiro',
            'exists' => 'Valor não encontrado na tabela'
        ];

        $request->validate($regra,$feedback);
        
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show',['produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit',['produto'=>$produto,'unidades'=>$unidades,'fornecedores'=>$fornecedores]);
        //return view('app.produto.create',['produto'=>$produto,'unidades'=>$unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $regra = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id', //verificando se a chave estrageira existe: exists:<table>,<column>
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'Campo obrigatorio',
            'min' => 'Informa no minimo 3 caracteres',
            'nome.max' => 'Informa no maximo 40 caracteres',
            'descricao.max' => 'Informa no maximo 2000 caracteres',
            'integer' => 'Campo deve ser inteiro',
            'exists' => 'Valor não encontrado na tabela'
        ];

        $request->validate($regra,$feedback);
        
        /*
        print_r($request->all()); //é o payload, o que esta vindo do form
        print_r($produto->getAttributes()); //instancia do objeto no estado anterior
        */
        $produto->update($request->all());
        return redirect()->route('produto.show',['produto'=>$produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
