Site da aplicação
<!-- auth tag que acontece apenas quando estiver logado -->
@auth
    <h1>Usuário Logado</h1>
    <p> ID {{ Auth::user()->id }} </p>
    <p> Nome {{ Auth::user()->name }} </p>
    <p> Email {{ Auth::user()->email }} </p>
@endauth

<!-- guest tag que acontece apenas quando não estiver logado -->
@guest
    <h1>Usuário não esta logado</h1>
@endguest