
<!--Estudos trecho de teste -->

{{-- Comentarios no blade, ele sera descartado pela interpretador--}}

{{-- condificando php dentro da view --}} 
@php
    //comentarios
    echo 'Teste de script';
@endphp
<br/>
{{ 'Teste de script 2' }}
<br/>
<?= 'Teste de script 3' ?>


@isset($fornecedor) <!-- isset é para saber se a variavel esta definida (se existe) -->
    @if(count($fornecedor) > 0 && count($fornecedor) < 10)
        <h3>Existem alguns fornecedores</h3>
    @elseif(count($fornecedor) > 10)
        <h3>Existem varios fornecedores</h3>
    @else
        <h3>Não existem fornecedores</h3>
    @endif
    <br/>
    <!-- imprimindo array multidimencional -->
    Fornecedor: {{ $fornecedor[0]['nome'] }}
    <br/>
    Status: {{ $fornecedor[0]['status'] }}
    <br/>
    @isset($fornecedor[0]['cnpj'])
        CNPJ: {{ $fornecedor[0]['cnpj'] }}
    @endisset
    <br/>
    <!--Verificando a negativa uma condição -->
    @unless($fornecedor[0]['status'] == 'S')
        Fornecedor inativo
    @endunless
    <br/>

    <!-- Veficar se uma variavel esta vazia -->
    <!--
        Situações que o Empty retorna true no php
        -''
        -0
        -0.0
        -'0'
        -null
        -false
        -array()
        -variavel declarada mas sem ser instanciada ex.: $var
    -->
    @isset($fornecedor[2]['cnpj'])
        CNPJ: {{ $fornecedor[2]['cnpj'] }}
        @empty($fornecedor[2]['cnpj'])
            -Vazio
        @endempty
    @endisset
    <br/>

    <!-- Valor default: ele é chamando quando variavel não existe ou quando esta null-->
    CNPJ Default: {{ $fornecedor[1]['cnpj'] ?? 'CNPJ não preenchido' }}

    <!--imprimindo arrays -->
    @dd($fornecedor); 
    <br/>
@endisset