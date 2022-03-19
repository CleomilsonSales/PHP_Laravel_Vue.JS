<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->timestamps();
            $table->id();
            //minhas colunas
            $table->string('unidade',5); //cm, mm, kg
            $table->string('descricao',30);
        });

        //relacionamento produtos
        Schema::table('produtos',function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
        
        //relacionamento detalhes_produtos
        Schema::table('produto_detalhes',function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //removendo o relacionamento detalhes_produtos
        Schema::table('produto_detalhes',function(Blueprint $table){
            //remover a fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //padrão laravel no nome da fk [table]_[coluna]_[foreign]
            //remover a coluna
            $table->dropColumn('unidade_id');
        });

        //removendo o relacionamento produtos
        Schema::table('produtos',function(Blueprint $table){
            //remover a fk
            $table->dropForeign('produtos_unidade_id_foreign'); //padrão laravel no nome da fk [table]_[coluna]_[foreign]
            //remover a coluna
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}
