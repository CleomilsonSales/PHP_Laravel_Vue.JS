<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    //criado para ensinar como fazer o eloquent ORM na situação que os nomes objetos não estão padronizado com as tabelas no
    
    //ajustando relacionamento para mapear a tabela produtos no banco
    protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id','comprimento','largura','altura','unidade_id'];

    //belongsTo Eloquent ORM
    public function produto(){
        //usando: primeiro o objeto para achar a tabela, depois fk e em seguinda a pk
        return $this->belongsTo('App\Item','produto_id','id');
    }
}