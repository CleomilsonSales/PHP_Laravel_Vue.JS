<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{
    /* chamando um middleware separadamente
    public function __construct(){
        $this->middleware(LogAcessoMiddleware::class);
    }*/
    
    public function sobreNos(){
        return view('site.sobre-nos');
    }
}
