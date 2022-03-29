<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
    Como o eloquent detecta da tabela no laravel
    -todas as letras maiuscula são consideradas para inserção de um "_"
    -depois ele deixa todas minusculas e no final acrescenta o S, assim ele acha a tabela
    -ex.: nessa class a tabela seria site_contatos
*/

class SiteContato extends Model
{
    //
}