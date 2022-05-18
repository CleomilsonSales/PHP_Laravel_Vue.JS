<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//rota completa pq nessa versão o laravel o namespace (RouteServiceProvider) esta comentado, no estudo não vou habilitar professor pediu
//autentificação pela rota
Route::resource('tarefa','App\Http\Controllers\TarefaController');//->middleware('auth');