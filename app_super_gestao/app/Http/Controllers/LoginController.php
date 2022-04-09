<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        
        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha inválido!';
        };
        
        if($request->get('erro') == 2){
            $erro = 'Necessário fazer login';
        };

        return view('site.login',['titulo'=>'Login','erro'=>$erro]);
    }

    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'E-mail invalido',
            'senha.required' => 'Senha obrigatória'
        ];

        $request->validate($regras,$feedback);

        //print_r($request->all());

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email',$email)
            ->where('password',$password)
            ->get()
            ->first();

        if(isset($usuario->name)){
            //iniciando a sessão do php
            session_start();
            //super global session - que fica do lado do servidor, então cada pessoa acessando tera sua propria variavel nome e email
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return  redirect()->route('app.home');

        }else{
            return redirect()->route('site.login',['erro'=>1]);
        }

    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
