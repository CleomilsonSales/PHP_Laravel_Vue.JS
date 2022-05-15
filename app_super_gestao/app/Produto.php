<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','descricao','peso','unidade_id','fornecedor_id'];

    //eloquent ORM hasOne (tem um)
    public function produtoDetalhe(){
        /* Relação pelo padrão de nomes padronizado para tabelas do laravel:
        Produto tem 1 produto detalhe
        
        1 registro relacionado em 
        produto_detalhes (fk) -> produto_id
        com a produto (pk) -> id */
        //1 para 1
        return $this->hasOne('App\ProdutoDetalhe');
    }

    //eloquent ORM 1 para N
    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor');
    }

    //eloquent ORM N para N
    public function pedidos(){
        //parametros: objeto de relacioanamento, tabela de relacionamento, nome fk mapeado pelo model da tabela de relaciomento,fk da tabela  utilizada no relacionamento
        //quando o nome do objeto não esta no padrão de nomeclatura
        //return $this->belongsToMany('App\Pedido','pedidos_produtos','produto_id','pedido_id');
        return $this->belongsToMany('App\Pedido','pedidos_produtos');
        
    }
}
