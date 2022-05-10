<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    //como o nome da classe não esta dentro do padrão para apontar para a tabela correta
    protected $table = 'pedidos_produtos';
}
