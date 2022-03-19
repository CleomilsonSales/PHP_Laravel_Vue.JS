<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatosController extends Controller
{
    public function contato(){
        var_dump($_POST); //var_dump apenas apresenta os valores do array de algo, é escrito no codigo.
        return view('site.contato');
    }
}
