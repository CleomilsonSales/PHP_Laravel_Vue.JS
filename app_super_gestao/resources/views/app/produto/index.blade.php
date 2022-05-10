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
                {{-- teste Lazy Loadign e Eager Loadign --}}
                {{-- {{ $produtos->toJson() }} --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Nome do Fornecedor</th>
                            <th>Site do Fornecedor</th>
                            <th>Peço</th>
                            <th>Unidade_id</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <th>{{ $produto->nome }}</th>
                                <th>{{ $produto->descricao }}</th>
                                <th>{{ $produto->fornecedor->nome}}</th>
                                <th>{{ $produto->fornecedor->site}}</th>
                                <th>{{ $produto->peso}}</th>
                                <th>{{ $produto->unidade_id }}</th>
                                {{-- forma manual do eloquent ORM 
                                <th>{{ $produto->comprimento ?? ' ' }}</th>
                                <th>{{ $produto->altura ?? ' ' }}</th>
                                <th>{{ $produto->largura ?? ' ' }}</th>
                                --}}
                                <!-- produtoDetalhe é um metodo no modelo Produto -->
                                <th>{{ $produto->produtoDetalhe->comprimento ?? ' ' }}</th>
                                <th>{{ $produto->produtoDetalhe->altura ?? ' ' }}</th>
                                <th>{{ $produto->produtoDetalhe->largura ?? ' ' }}</th>
                                 <th><a href="{{ route('produto.show',['produto' => $produto->id]) }}">Visualizar</a></th>
                                <th>
                                    <form id="form_{{ $produto->id }}" method="post" action="{{ route('produto.destroy',['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                    </form>
                                </th>
                                <th><a href="{{ route('produto.edit',['produto' => $produto->id]) }}">Editar</a></th>
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
