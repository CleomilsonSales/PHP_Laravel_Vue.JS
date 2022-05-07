<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //criado para ensinar como fazer o eloquent ORM na situação que os nomes objetos não estão padronizado com as tabelas no
    
    //ajustando relacionamento para mapear a tabela produtos no banco
    protected $table = 'produtos';
    protected $fillable = ['nome','descricao','peso','unidade_id'];

    //eloquent ORM hasOne (tem um)
    public function produtoDetalhe(){
        //usando: primeiro o objeto para achar a tabela, depois fk e em seguinda a pk
        return $this->hasOne('App\ItemDetalhe','produto_id','id');
    }
}
