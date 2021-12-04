<?php

use App\Http\Controllers\ResiduosAPIController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/envia', [ResiduosAPIController::class, 'recebePlanilha']);
Route::get('/residuos/show', [ResiduosAPIController::class, 'show']);
Route::get('/residuos/id', [ResiduosAPIController::class, 'showid']);
Route::post('/residuos/editar', [ResiduosAPIController::class, 'editar']);
Route::post('/residuos/deletar', [ResiduosAPIController::class, 'deletar']);
Route::get('/residuos/statusplanilha', [ResiduosAPIController::class, 'statusPlanilhaEnviada']);
