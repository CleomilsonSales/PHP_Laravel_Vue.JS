<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //SoftDeletes é usado para criar uma deleção suave ou seja o registro não é apagado de fato, mas o sistema não enxega mais o resgistro no banco, ele cria um nova coluna para fazer esse controle
    //para deletar realmente agora tem que usar o forceDelete(); para voltar ao normal usar o ->restore(); no resgistro 
    //para mostrar os itens deletados usar o : Fornecedor::withTrashed() ou onlyTrashed();
    //esse use é um Trait, ele serve para tratar a questão das heranças multiplicas
    //Isso foi criado na migrations
    use SoftDeletes;
    //dessa forma o eloquent não segue o padrão de entendimento de nome da tabela pela class
    protected $table = 'fornecedores'; 
    //autorizando o metodo estatico create a usar os campos
    protected $fillable = ['nome','site','uf','email'];
}


