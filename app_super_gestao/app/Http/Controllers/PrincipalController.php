<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    //Criando um metodo, que na literatura do php é chamdo de action
    public function principal(){
        //echo 'Olá, seja bem-vindo!';
        //site.principal é o caminho onde esta a view, sendo site a subpasta e o principal o nome do arquivo omitindo o .blace.php, pq o laravel ja entende isso
        return view('site.principal');
    }
}
