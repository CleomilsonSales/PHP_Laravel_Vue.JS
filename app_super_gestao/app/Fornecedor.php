<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //dessa forma o eloquent não segue o padrão de entendimento de nome da tabela pela class
    protected $table = 'fornecedores'; 
    //autorizando o metodo estatico create a usar os campos
    protected $fillable = ['nome','site','uf','email'];
}


