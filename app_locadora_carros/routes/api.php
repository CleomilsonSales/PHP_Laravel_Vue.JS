<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* apenas teste
Route::get('/', function () {
    return ['Chegamos ate aqui' => 'SIM'];
});
*/

//pra não precisar informar todo o caminho do controle
/*
ir em app/providers/RouteServiceProvider 
e tirar o comentario do trecho
protected $namespace = 'App\\Http\\Controllers';
 */

Route::apiResource('cliente','App\Http\Controllers\ClienteController');
Route::apiResource('carro','App\Http\Controllers\CarroController');
Route::apiResource('locacao','App\Http\Controllers\LocacaoController');
Route::apiResource('marca','App\Http\Controllers\MarcaController');
Route::apiResource('modelo','App\Http\Controllers\ModeloController');
