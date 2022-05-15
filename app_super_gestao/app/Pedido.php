<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id'];

    //eloquent ORM - N para N
    public function produtos(){
        return $this->belongsToMany('App\Produto','pedidos_produtos')
            ->withPivot('id','created_at','updated_at'); //usado para incluir colocas no pivot do relacionamento
        //quando a class não esta padronizada com a tabela
        /*
        parametros:
        1-Modelo do relacionamento NxN em relação o Modelo implementado
        2-tabela auxilar do relacionamento
        3-FK da tabela mapeada pelo modelo do relacionamento
        4-FK da tabela mapeada  utilizada no relacionamento (Item)
        */
        //return $this->belongsToMany('App\Item','pedidos_produtos','pedido_id','produto_id');
    }
}
