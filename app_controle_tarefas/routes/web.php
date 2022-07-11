<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MensagemTesteMail;

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

Route::get('/', function () {
    return view('bem-vindo');
});

//validação de email no cadastro
Auth::routes(['verify'=>true]);

Route::get('tarefa/exportacao/{extensao}','App\Http\Controllers\TarefaController@exportacao')
    ->name('tarefa.exportacao');

Route::get('tarefa/exportar','App\Http\Controllers\TarefaController@exportar')
    ->name('tarefa.exportar');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');

//rota completa pq nessa versão o laravel o namespace (RouteServiceProvider) esta comentado, no estudo não vou habilitar professor pediu
//autentificação pela rota
Route::resource('tarefa','App\Http\Controllers\TarefaController')
    ->middleware('verified');//->middleware('auth');

Route::get('mensagem-teste',function(){
    return new MensagemTesteMail();
    /*Mail::to('cleomilsonsales@hotmail.com')->send(new MensagemTesteMail());
    return 'Email enviado com sucesso';*/
});