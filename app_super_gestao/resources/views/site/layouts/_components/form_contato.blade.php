<!-- slot carrega os parametros do component-->
{{ $slot }}
{{ $x }}
<form action={{ route('site.contato') }} method="post">
    <!--Tratando um token para atender a exigencia do laravel, evitando problemas de cross-site-->
    @csrf <!-- isso cria um input oculto com um token criado automaticamente -->
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    @if ($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    {{-- 
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1" {{ old('motivo_contato') == 1 ? 'selected' : '' }}>Dúvida</option>
        <option value="2" {{ old('motivo_contato') == 2 ? 'selected' : '' }}>Elogio</option>
        <option value="3" {{ old('motivo_contato') == 3 ? 'selected' : '' }}>Reclamação</option>
    </select>
    --}}
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea name="mensagem" class="borda-preta"> {{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button name="submit" type="submit" class="borda-preta">ENVIAR</button>
</form>
{{--
<!-- verificando se exsite algum erro -->
@if($errors->any())
    <!-- acessando a variavel errors da view -->
    <div style="position:absolute; top:0px; left:0px;width:100%;background:red">
        @foreach ($errors->all() as $erro)
            {{ $erro }}
            <br>
        @endforeach

        <pre>
            {{ print_r($errors) }}        
        </pre>
    </div>
@endif
--}}