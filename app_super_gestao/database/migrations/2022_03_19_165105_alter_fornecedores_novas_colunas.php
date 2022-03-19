<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add colunas 
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf',2);
            $table->string('email',150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop colunas
        Schema::table('fornecedores', function (Blueprint $table) {
            //$table->dropColumn('uf');
            $table->dropColumn(['uf','email']);
        });
    }
}
