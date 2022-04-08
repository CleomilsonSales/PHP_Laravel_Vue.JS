<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //esta aplicado na route e nos controllers(contrutor)
        
        //return $next($request);

        //testes
        //pegando a requisição
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        //aspa duplas faz interpolação com variaveis
        LogAcesso::create(['log'=>"IP $ip requisitou a rota $rota"]);
        
        //manipulando a resposta do request
        $resposta = $next($request);
        //mudando o codigo (RestFull) da resposta
        $resposta->setStatusCode(201,'O status e texto da resposta foi modificado');

        //dd($resposta);
        return $resposta;

        //return Response('Resposta middleware');
        //return $next($request);

        

    }
}
