@extends('app.layouts.basico')

@section('titulo','Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listar - Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peço</th>
                            <th>Unidade_id</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <th>{{ $produto->nome }}</th>
                                <th>{{ $produto->descricao }}</th>
                                <th>{{ $produto->peso}}</th>
                                <th>{{ $produto->unidade_id }}</th>
                                <th><a href="{{ route('app.fornecedor.excluir',$produto->id) }}">Excluir</a></th>
                                <th><a href="{{ route('app.fornecedor.editar',$produto->id) }}">Editar</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
                <br>
            </div>
        </div>
    </div>
    


@endsection
