<!-- usando o template com o extends e section-->
@extends('site.layouts.basico')

@section('titulo',$titulo/*'Home'*/)
@section('conteudo') <!--para ir para o yield -->
    
    <div class="conteudo-destaque">

        <div class="esquerda">
            <div class="informacoes">
                <h1>Sistema Super Gestão</h1>
                <p>Software para gestão empresarial ideal para sua empresa.<p>
                <div class="chamada">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="texto-branco">Gestão completa e descomplicada</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="texto-branco">Sua empresa na nuvem</span>
                </div>
            </div>

            <div class="video">
                <img src="{{ asset('img/player_video.jpg') }}">
            </div>
        </div>

        <div class="direita">
            <div class="contato">
                <h1>Contato</h1>
                <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.<p>
                <!-- um include que aceita parametros para melhor o carrgamento da view 
                    ele pode ser um array associativo na chamada da view ou por slot (em contato)-->
                @component('site.layouts._components.form_contato',['x'=>10, 'classe'=> 'borda-branca'])
                @endcomponent;
            </div>
        </div>
    </div>
@endsection