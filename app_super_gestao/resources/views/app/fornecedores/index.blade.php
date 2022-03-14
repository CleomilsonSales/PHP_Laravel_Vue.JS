<h3>Fornecedores</h3>

@isset($fornecedor)
    {{-- isset($fornecedor[i] - dessa formando quando i for maior que o array retornara false, que forçará sair do laço --}}
    {{-- @for($i=0;isset($fornecedor[$i]);$i++) --}}
    
    {{--@php $i = 0 @endphp
    @While(isset($fornecedor[$i]))
    
        Fornecedor: {{ $fornecedor[$i]['nome'] }}
        <br/>
        Status: {{ $fornecedor[$i]['status'] }}
        <br/>
        CNPJ: {{ $fornecedor[$i]['cnpj'] ?? 'CNPJ não preenchido' }}
        <br/>
        Telefone: {{ $fornecedor[$i]['ddd'] ?? '' }} {{ $fornecedor[$i]['telefone'] ?? '' }}
        @switch($fornecedor[$i]['ddd'])
            @case('85')
                Capital - CE
                @break
            @case('88')
                Interior - CE
                @break
            @default
                Outro estado    
        @endswitch
    <hr/>

    {{--@php $i++ @endphp
    @endwhile--}}

    {{-- @endfor --}}

    {{-- usando foreach
    mudando o valor da variavel no contexto do foreach: @php $fornecedores['nome'] = 'novo nome'  @endphp
    mudando o valor do array original, deve usar o indice: @php $fornecedores[$indice]['nome'] = 'novo nome'  @endphp
    
    @foreach ( $fornecedor as $indice => $fornecedores )
        Fornecedor: {{ $fornecedores['nome'] }}
        <br/>
        Status: {{ $fornecedores['status'] }}
        <br/>
        CNPJ: {{ $fornecedores['cnpj'] ?? 'CNPJ não preenchido' }}
        <br/>
        Telefone: {{ $fornecedores['ddd'] ?? '' }} {{ $fornecedores['telefone'] ?? '' }}
        @switch($fornecedores['ddd'])
            @case('85')
                Capital - CE
                @break
            @case('88')
                Interior - CE
                @break
            @default
                Outro estado    
        @endswitch
    <hr/>
    @endforeach--}}

    {{-- no forelse se o array estiver vazio, podemos desviar o fluxo de exibição das informações --}}
    @forelse ( $fornecedor as $indice => $fornecedores )
        Contagem atual do laço: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedores['nome'] }}
        <br/>
        Status: {{ $fornecedores['status'] }}
        <br/>
        CNPJ: {{ $fornecedores['cnpj'] ?? 'CNPJ não preenchido' }}
        <br/>
        Telefone: ({{ $fornecedores['ddd'] ?? '' }}) {{ $fornecedores['telefone'] ?? '' }}
        @switch($fornecedores['ddd'])
            @case('85')
                Capital - CE
                @break
            @case('88')
                Interior - CE
                @break
            @default
                Outro estado    
        @endswitch
        @if($loop->first)
            <br>
            Primeira iteração do loop

            {{-- retornando os objetos do loop: @dd($loop) --}}

        @endif
        @if($loop->last)
            <br>
            Última iteração do loop
            <br>
            Total de registros: {{ $loop->count }}
        @endif
    <hr/>
    @empty
        Não existem forncedores cadastrados
    @endforelse

    {{-- para imprimir o bloco de codigo no navegador basta usar o @ antes do bloco ex.: 
    Status: @{{ $fornecedores['status'] }}
    --}}
@endisset
