@extends('app.layouts.basico')

@section('titulo','Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listar - Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <th>{{ $pedido->id }}</th>
                                <th>{{ $pedido->cliente_id }}</th>
                                <th><a href="{{ route('pedido-produto.create',['pedido' => $pedido->id]) }}">Adicionar produtos</a></th>
                                <th><a href="{{ route('pedido.show',['pedido' => $pedido->id]) }}">Visualizar</a></th>
                                <th>
                                    <form id="form_{{ $pedido->id }}" method="post" action="{{ route('pedido.destroy',['pedido' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                    </form>
                                </th>
                                <th><a href="{{ route('pedido.edit',['pedido' => $pedido->id]) }}">Editar</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
                <br>
            </div>
        </div>
    </div>
    


@endsection
