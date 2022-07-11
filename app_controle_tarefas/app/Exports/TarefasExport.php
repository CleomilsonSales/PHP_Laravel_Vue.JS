<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
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

    public function headings():array{
        return ['ID Tarefa',
                //'ID Usuario',
                'Tarefa',
                'Data Limite conclusão'];
                //'Data criação',
                //'Data atualização'];
    }

    public function map($linha):array{
        return [
            $linha->id,
            $linha->tarefa,
            date('d/m/Y', strtotime($linha->data_limite_conclusao))
        ];
    }
}
