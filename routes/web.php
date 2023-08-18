<?php

use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\FadPainelController;
use App\Http\Controllers\habilitacaoController;
use App\Http\Controllers\SSOController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RecursosController;
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



Route::get('/', [PublicController::class, 'inscricao']);
Route::post('/', [PublicController::class, 'inscricaoSave']);


Route::get('/dashboard', [FadPainelController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/create', [UserController::class, 'store']);
Route::get('/users/show', [UserController::class, 'show']);
Route::post('/users/show', [UserController::class, 'update']);
Route::post('/users/delete', [UserController::class, 'delete']);
Route::post('/users/grantPermission', [UserController::class, 'permission_store']);
Route::post('/users/deletePermission', [UserController::class, 'permission_delete']);
Route::get('/permissions', [PermissionController::class, 'index']);


Route::get('/inscricao', [PublicController::class, 'inscricao']);

Route::get('/inscritos', [FadPainelController::class, 'inscricao']);

 Route::post('/inscricao', [PublicController::class, 'inscricaoSave']);

Route::get('/comprovante/{uuid}/{validador}', [PublicController::class, 'comprovante']);

Route::get('/imprimirComprovante/{uuid}/{validador}', [FadPainelController::class, 'imprimirComprovante']);

Route::get('/panel/inscritos', [FadPainelController::class, 'inscritos']);

Route::get('/panel/inscritos/visualizar/{uuid}', [FadPainelController::class, 'inscritosVisualizar']);

Route::post('/panel/inscritos/visualizar/{uuid}', [FadPainelController::class, 'inscritosVisualizarSave']);

Route::get('/panel/inscritos/habilitados', [habilitacaoController::class, 'habilitados']);

Route::get('/panel/inscritos/naohabilitados', [habilitacaoController::class, 'naohabilitados']);

Route::get('/panel/inscritos/habilitacaoI', [habilitacaoController::class, 'habilitacaoI']);

Route::post('/panel/inscritos/habilitacaoISave', [habilitacaoController::class, 'habilitacaoISave']);

Route::get('/panel/inscritos/habilitacaoII', [habilitacaoController::class, 'habilitacaoII']);

Route::post('/panel/inscritos/habilitacaoIISave', [habilitacaoController::class, 'habilitacaoIISave']);

Route::get('/panel/inscritos/habilitacaoIII', [habilitacaoController::class, 'habilitacaoIII']);

Route::post('/panel/inscritos/habilitacaoIIISave', [habilitacaoController::class, 'habilitacaoIIISave']);

Route::get('/panel/inscritos/habilitacaoInaorealizada', [habilitacaoController::class, 'habilitacaoI']);

Route::get('/panel/inscritos/habilitacaoIInaorealizada', [habilitacaoController::class, 'habilitacaoII']);

Route::get('/panel/inscritos/habilitacaoIIInaorealizada', [habilitacaoController::class, 'habilitacaoIII']);

Route::get('/panel/inscritos/avaliacaoI', [AvaliacaoController::class, 'avaliacaoI']);

Route::post('/panel/inscritos/avaliacaoISave', [AvaliacaoController::class, 'avaliacaoISave']);

Route::get('/panel/inscritos/avaliacaoII', [AvaliacaoController::class, 'avaliacaoII']);

Route::post('/panel/inscritos/avaliacaoIISave', [AvaliacaoController::class, 'avaliacaoIISave']);

Route::get('/panel/inscritos/avaliacaoIII', [AvaliacaoController::class, 'avaliacaoIII']);

Route::post('/panel/inscritos/avaliacaoIIISave', [AvaliacaoController::class, 'avaliacaoIIISave']);

Route::get('/panel/inscritos/avaliacaoIV', [AvaliacaoController::class, 'avaliacaoIV']);

Route::post('/panel/inscritos/avaliacaoIVSave', [AvaliacaoController::class, 'avaliacaoIVSave']);

Route::get('/panel/inscritos/avaliacaoInaorealizada', [AvaliacaoController::class, 'avaliacaoInaorealizada']);

Route::get('/panel/inscritos/avaliacaoIInaorealizada', [AvaliacaoController::class, 'avaliacaoIInaorealizada']);

Route::get('/panel/inscritos/avaliacaoIIInaorealizada', [AvaliacaoController::class, 'avaliacaoIIInaorealizada']);

Route::get('/panel/inscritos/avaliacaoIVnaorealizada', [AvaliacaoController::class, 'avaliacaoIVnaorealizada']);

Route::get('/baixar/{id}/{arquivo}', [FadPainelController::class, 'arquivo']);

Route::get('/panel/ranking', [FadPainelController::class, 'inscritos']);

Route::get('/recurso/login', [RecursosController::class, 'acesso']);

Route::post('/recurso/login', [RecursosController::class, 'validacao']);

Route::get('/recurso/projetos', [RecursosController::class, 'projetos']);

Route::get('/recurso/projetos/visualizar/{uuid}', [RecursosController::class, 'projetosVisualizar']);

Route::post('/recurso/upload', [RecursosController::class, 'upload']);

Route::post('/recurso/save', [RecursosController::class, 'save']);

Route::get('/recurso/sair', [RecursosController::class, 'logoff']);

// Route::get('/teste/{token}', [RecursosController::class, 'verificaAccessToken']);







