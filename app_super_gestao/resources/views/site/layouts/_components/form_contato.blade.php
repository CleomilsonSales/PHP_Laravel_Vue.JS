<!-- slot carrega os parametros do component-->
{{ $slot }}
{{ $x }}
<form action={{ route('site.contato') }} method="post">
    <!--Tratando um token para atender a exigencia do laravel, evitando problemas de cross-site-->
    @csrf <!-- isso cria um input oculto com um token criado automaticamente -->
    <input name="nome" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="borda-preta">Preencha aqui a sua mensagem</textarea>
    <br>
    <button name="submit" type="submit" class="borda-preta">ENVIAR</button>
</form>