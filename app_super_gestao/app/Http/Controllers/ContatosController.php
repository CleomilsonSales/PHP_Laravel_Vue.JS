<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatosController extends Controller
{
    public function contato(Request $request){
        //dd($request); //esse é a forma resumida do var_dump+die
        //var_dump($_POST); //var_dump apenas apresenta os valores do array de algo, é escrito no codigo.
        /*
        //teste de recuperação do request
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        //outra forma
        echo '<br>';
        echo $request-> input('nome');
        echo '<br>';
        */

        /* uma forma de persistencia
        $contato = new SiteContato();
        $contato->nome = $request-> input('nome');
        $contato->telefone = $request-> input('telefone');
        $contato->email = $request-> input('email');
        $contato->motivo_contato = $request-> input('motivo_contato');
        $contato->mensagem = $request-> input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save();
        */

        /* outra forma de persistencia
        $contato = new SiteContato();
        //fill precisa do save();
        //$contato->fill($request->all()); //preenche os atributos do objeto no array associativo (lembrar de definir o fillable no objeto)
        $contato->create($request->all());

        //print_r($contato->getAttributes());
        //$contato->save();
        */

        $motivo_contatos = MotivoContato::all();

        return view('site.contato',['motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){
        $regra = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        
        $feedback = [
            'nome.required'=>'Nome deve ser preenchido',
            'nome.min'=>'Nome deve ter no minimo 3 caracteres',
            'nome.max'=>'Nome deve ter no maximo 3 caracteres',
            'nome.unique'=>'Nome ja existe',
            'required'=>'O campo :attribute deve ser preenchido', //mensagem generica
            'email'=>'E-mail invalido',
            'mensagem.max'=>'Mensagem deve ter no maximo 2.000 caracteres',
        ];

        //validando o request
        $request->validate($regra, $feedback);

        //sem instanciar o objeto, forma mais enxuta
        SiteContato::create($request->all());
        //redirecionando a pagina
        return redirect()->route('site.index');
    }
}
