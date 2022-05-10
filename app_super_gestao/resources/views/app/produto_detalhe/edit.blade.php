@extends('app.layouts.basico')

@section('titulo','Detalhes dos Produtos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Edição - Detalhes dos Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <!-- aplicando o belongTo (pertence a) ou seja 1 para 1, mas ao contrario da tabela mais fraca para mais forte 
            lembrando que produto é um metodo do model produtoDetalhe
            -->
            <h4>Produto</h4>
            <div>Nome: {{ $produto_detalhe->produto->nome }}</div>
            <br>
            <div>Descriação: {{ $produto_detalhe->produto->descricao  }}</div>
            <br>

            {{ $msg ?? '' }}
            <div style="width:30%; margin-left:auto;margin-right:auto;">
                @component('app.produto_detalhe._components.form_create_edit',['produto_detalhe'=>$produto_detalhe,'unidades'=>$unidades])
                @endcomponent
            </div>
        </div>
    </div>
    


@endsection
