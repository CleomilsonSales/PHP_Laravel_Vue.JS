<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnvioPController extends Controller
{
    //tipando para garantir a integridade
    public function envioP (int $p1, int $p2){
        //echo "A soma de $p1 + $p2 é: ".($p1 + $p2);

        
        //array associativo
        /*return view('site.envio_p',['p1' => $p1,
                                    'p2' => $p2,
                                    'r'  => ($p1 + $p2)]);
        */

        //metodo compact
        /*$r = ($p1 + $p2);
        return view('site.envio_p',compact('p1','p2','r'));  */
        
        //metodo with
        return view('site.envio_p')
            ->with('p1',$p1)
            ->with('p2',$p2)
            ->with('r',($p1 + $p2));  

    }
}
