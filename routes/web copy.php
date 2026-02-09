<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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


Route::group(['middleware' => ['role:admin|secretaria|ti_filial']],function () {
    Route::resource('cursos', App\Http\Controllers\CursoController::class);
    Route::resource('calendarioEscolars', App\Http\Controllers\CalendarioEscolarController::class);
    Route::resource('credenciamentos', App\Http\Controllers\CredenciamentoController::class);
    Route::resource('legislacaos', App\Http\Controllers\legislacaoController::class);
    Route::resource('servicos', App\Http\Controllers\ServicoController::class);
    Route::resource('informacaos', App\Http\Controllers\InformacaoController::class);
    Route::resource('detalhes', App\Http\Controllers\DetalheController::class);
    Route::resource('mapaSalas', App\Http\Controllers\MapaSalaController::class);
    Route::resource('dirigentes', App\Http\Controllers\DirigenteController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('filials', App\Http\Controllers\FilialController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);

});