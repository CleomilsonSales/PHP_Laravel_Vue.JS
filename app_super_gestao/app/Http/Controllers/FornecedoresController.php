<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index (){
        //imprimindo um array
        //$fornecedor = ['Fornecedor'];
        //array multidimencional
        $fornecedor = [
            0 => [
                'nome' => 'Fornecedor',
                'status'=>'N',
                'cnpj'=>'00.000.000/000-00',
                'ddd' => '85',
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor2',
                'status'=>'S',
                'ddd' => '88',
                'telefone' => '0000-0000'
            ],
            2 => [
                'nome' => 'Fornecedor3',
                'status'=>'S',
                'cnpj'=>'0',
                'ddd' => '11',
                'telefone' => '0000-0000'
            ]
        ];

        // Operador condicional tenario: condicao ? se verdade : se falso;
        //$msg = isset($fornecedor[1]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
        //echo $msg;

        //para teste do forelse
        //$fornecedor = [];


        return view('app.fornecedores.index',compact('fornecedor'));
        //return view('app.fornecedores.testes',compact('fornecedor'));
        //return view('app.fornecedores.index');
    }
}
