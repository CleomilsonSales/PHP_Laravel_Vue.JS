@component('mail::message')
<!-- markdown ja faz um bind, ou seja as variaveis estão no contexto, podendo ser chamdas direto-->
# {{ $tarefa }}

Data limite de conclusão: {{ $data_limite_conclusao }}

@component('mail::button', ['url' => $url])
Clique aqui para ver tarefa
@endcomponent

Att,<br>
{{ config('app.name') }}
@endcomponent
