<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;

class TarefasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Tarefa::all(); --se quiser trazer tudo sem trativa
        //testando o relacionamento
        //dd(auth()->user()->tarefas()->get());
        //retornando um collection das tarefas apenas do usuario conectado
        return auth()->user()->tarefas()->get();
    }
}
