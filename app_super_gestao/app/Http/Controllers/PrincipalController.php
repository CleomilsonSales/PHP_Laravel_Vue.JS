<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{
    //Criando um metodo, que na literatura do php é chamdo de action
    public function principal(){
        //echo 'Olá, seja bem-vindo!';
        //site.principal é o caminho onde esta a view, sendo site a subpasta e o principal o nome do arquivo omitindo o .blace.php, pq o laravel ja entende isso
        
        /*
        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogios',
            '3' => 'Reclamações',
        ];*/

        $motivo_contatos = MotivoContato::all();
        
        return view('site.principal',['titulo'=>'Home','motivo_contatos'=>$motivo_contatos]);
    }
}
