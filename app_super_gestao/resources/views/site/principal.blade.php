<!--o .blade é um padrão do laravel, para identificar que o arquivo é um view
 o blade é um recurso de processamento (renderização) de views do laravel -->
<h3>Seja bem-vindo!</h3>

<ul>
    <li>
        <a href="{{ route('site.index') }}">Principal</a>
    </li>
    <li>
        <a href="{{ route('site.sobrenos') }}">Sobre Nós</a>
    </li>
    <li>
        <a href="{{ route('site.contato') }}">Contatos</a>
    </li>
</ul>