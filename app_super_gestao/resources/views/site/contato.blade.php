<!-- usando o template com o extends e section-->
@extends('site.layouts.basico')

@section('titulo','Contato')
@section('conteudo') <!--para ir para o yield -->

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato',['x'=>10, 'classe'=> 'borda-preta','motivo_contatos' => $motivo_contatos])
                    <!-- usando slot -->
                    <p>A nossa equipe analisará a sua mensagem em breve </p>
                    <p>Nosso tempo de resposta é de 48 horas</p>
                @endcomponent;
            </div>
        </div>  
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection