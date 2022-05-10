<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','descricao','peso','unidade_id'];

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
}
