<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return 'Sejam Bem-vindos';
});

*/

//o laravel reconhece que a string tem o nome de uma Controller e faz a trataiva do callback
//name é um apelido para as rotas para usar dentro da aplicação para tirar as dependencias absolutas com os links
/*
usando middleware separado
Route::middleware(LogAcessoMiddleware::class)
    ->get('/','PrincipalController@principal')
    ->name('site.index');


    //middleware por apelido
    ->middleware('log.acesso')
*/
Route::get('/','PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos','SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contatos','ContatosController@contato')->name('site.contato');
//obs.: o post no laravel exigi um token
Route::post('/contatos','ContatosController@salvar')->name('site.contato');
//o simbolo ? torna o parametro não obrigatorio 
Route::get('/login/{erro?}','LoginController@index')->name('site.login');
Route::post('/login','LoginController@autenticar')->name('site.login');

//agrupando rotas
Route::middleware('autenticacao:padrao,visitante')->
    prefix('/app')->group(function(){
        Route::get('/home','HomeController@index')->name('app.home');
        Route::get('/sair','LoginController@sair')->name('app.sair');
        Route::get('/cliente','ClienteController@index')->name('app.cliente');
        //Route::get('/fornecedore','FornecedoresController@index')->name('app.fornecedore');
        Route::get('/fornecedor','FornecedorController@index')->name('app.fornecedor');
        Route::post('/fornecedor/listar','FornecedorController@listar')->name('app.fornecedor.listar');
        Route::get('/fornecedor/listar','FornecedorController@listar')->name('app.fornecedor.listar');
        Route::get('/fornecedor/adicionar','FornecedorController@adicionar')->name('app.fornecedor.adicionar');
        Route::post('/fornecedor/adicionar','FornecedorController@adicionar')->name('app.fornecedor.adicionar');
        Route::get('/fornecedor/editar/{id}/{msg?}','FornecedorController@editar')->name('app.fornecedor.editar');
        Route::get('/fornecedor/excluir/{id}}','FornecedorController@excluir')->name('app.fornecedor.excluir');
        //resource criar as rodas com base no metodos padrões
        Route::resource('produto','ProdutoController');
});

Route::get('/rota1',function(){
    echo 'Rota 1';
})->name('site.rota1');

//redirecionando pela função de callback
Route::get('/rota3',function(){
    return redirect()->route('site.rota1');
})->name('site.rota3');

//redirecionando pelo Objeto Route
Route::redirect('/rota2','/rota1');

//rota de fallback
Route::fallback(function(){
    echo 'Página não encontrada. <a href="'.route('site.index').'">Clique aqui</a> para voltar para o inicio';
});

//"" serve para interpolar variaveis com string
//. serve para concatenar strings com variaveis
//? informa que o parametro é opcional
//metodo where serve para definir um expressão regular para o que é aceito no parametro
//[0-9]+ informa que deve ser apenas numeros de 0 a 9 e o + seria exigindo pelo menos 1 numero

Route::get('/contatos/{nome}/{categoria_id}/{assunto}/{mensagem?}',function(string $nome,
                                                                        int $categoria_id,
                                                                        string $assunto,
                                                                        string $mensagem = 'Mensagem não enviada'){
    echo "Estamos aqui: $nome - $categoria_id - $assunto - $mensagem";
})->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');


//enviando parametros de route para controller
Route::get('/envio_p/{p1}/{p2}','EnvioPController@envioP')-> name('site.envio_p');