@extends('app.layouts.basico')

@section('titulo','Pedido Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            {{--@if(isset($produto->id))
                <p>Editar - Produtos</p>
            @else--}}
                <p>Adicionar - Produtos ao pedido</p>
            {{--@endif--}}
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <div style="width:30%; margin-left:auto;margin-right:auto;">
                <h4>Itens do Pedido</h4>
                <!-- eloquent ORM - N para N que esta no model Pedidos-->
                {{-- testes: {{ $pedido }} --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do produto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedido->produtos as $produto)
                        <tr>
                            <th>{{ $produto->id }}</th>
                            <th>{{ $produto->nome }}</th>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                @component('app.pedido_produto._components.form_create',['pedido'=>$pedido,'produtos'=>$produtos])
                @endcomponent
            </div>
        </div>
    </div>
    


@endsection
