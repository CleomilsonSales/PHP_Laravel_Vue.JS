<!-- slot carrega os parametros do component-->
{{ $slot }}
{{ $x }}
<form action={{ route('site.contato') }} method="post">
    <!--Tratando um token para atender a exigencia do laravel, evitando problemas de cross-site-->
    @csrf <!-- isso cria um input oculto com um token criado automaticamente -->
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    {{-- 
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1" {{ old('motivo_contato') == 1 ? 'selected' : '' }}>Dúvida</option>
        <option value="2" {{ old('motivo_contato') == 2 ? 'selected' : '' }}>Elogio</option>
        <option value="3" {{ old('motivo_contato') == 3 ? 'selected' : '' }}>Reclamação</option>
    </select>
    --}}
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contato') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>

    <br>
    <textarea name="mensagem" class="borda-preta"> {{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    <br>
    <button name="submit" type="submit" class="borda-preta">ENVIAR</button>
</form>

<!-- acessando a variavel errors da view -->
<div style="position:absolute; top:0px; left:0px;width:100%;background:red">
    <pre>
        {{ print_r($errors) }}        
    </pre>
</div>