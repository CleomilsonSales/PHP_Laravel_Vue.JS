<h3>Fornecedores</h3>

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

@isset($fornecedor) <!-- isset é para saber se a variavel esta definida -->
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
    
    <!--imprimindo arrays -->
    @dd($fornecedor); 
    <br/>
@endisset





