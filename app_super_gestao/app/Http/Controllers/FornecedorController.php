<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function editar($id, $msg=''){
        $fornecedor = Fornecedor::find($id);
        
        return view('app.fornecedor.adicionar',['fornecedor'=>$fornecedor,'msg'=>$msg]);
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::where('nome','like','%'.$request->input('nome').'%')
            ->where('site','like','%'.$request->input('site').'%')
            ->where('uf','like','%'.$request->input('uf').'%')
            ->where('email','like','%'.$request->input('email').'%')
            ->get();

        //dd($fornecedores);

        return view('app.fornecedor.listar',['fornecedores'=>$fornecedores]);
    }

    public function adicionar(Request $request){
        
        $msg = '';
        //inclusão
        if($request->input('_token')!='' && $request->input('id') == ''){
            //validacao
            $regra = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback=[
                'required' => 'O campo :attribute deve ser informado',
                'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no maximo 40 caracteres',
                'uf.min' => 'O campo nome deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo nome deve ter no maximo 2 caracteres',
                'email.email' => 'E-mail inválido'
            ];

            $request->validate($regra,$feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }

        //edicao
        if($request->input('_token')!='' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update){
                $msg = 'Update realizado com sucesso';
            }else{
                $msg = 'Erro no Update';
            }

            return redirect()->route('app.fornecedor.editar',['id'=> $request->input('id'),'msg'=>$msg]);
        }

        return view('app.fornecedor.adicionar',['msg'=>$msg]);
    }
    
}
