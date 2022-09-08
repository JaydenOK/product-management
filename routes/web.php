<?php

use App\Http\Controllers\BomController;
use App\Http\Controllers\ProductController;
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

Route::group(['prefix' => '/warehouse', 'middleware' => []], function () {
    //bom api
    Route::get('/bom/{id?}', [BomController::class, 'lists']);
    Route::post('/bom', [BomController::class, 'add']);
    Route::put('/bom', [BomController::class, 'update']);
    Route::delete('/bom/{bom_id}', [BomController::class, 'delete']);

    //product api
    Route::get('/products', [ProductController::class, 'lists']);
});
