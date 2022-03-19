<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->timestamps();
            $table->id();
            //colunas
            $table->unsignedBigInteger('produto_id');//conversão, padrões de boas praticas no laravel o nome do relacionamento deve ser o nome da tabela no singular mas o id
            $table->float('comprimento',8,2);
            $table->float('largura',8,2);
            $table->float('altura',8,2);

            //constraint (chave estrageira)
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id'); //garantindo nessa situação que existe apenas um relacionamento
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
}
