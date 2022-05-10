<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        //criando coluna de relacionamento entre produtos e forncedores
        Schema::table('produtos',function(Blueprint $table){
            /*
            como a tabela forncedores ja tem informação, ao atribuir a fk dará um problema de constraint 
            o ficara com o campo novo 0 e não existe fornecedor zero, para evitar isso, o professor indicou 
            criar um registro padrão (não concordo mas...)
            */
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome'=>'Fornecedor Padrão',
                'site'=>'www.fornecedorpadrao.com',
                'uf'=>'CE',
                'email'=>'contato@fornecedorpadrao.com'
            ]);
            
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos',function(Blueprint $table){
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    
    }
}
