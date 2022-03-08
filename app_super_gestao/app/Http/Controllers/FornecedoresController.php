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
                'cnpj'=>'00.000.000/000-00'
            ],
            1 => [
                'nome' => 'Fornecedor2',
                'status'=>'S'
            ],
        ];
        return view('app.fornecedores.index',compact('fornecedor'));
        //return view('app.fornecedores.index');
    }
}
