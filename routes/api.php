<?php

use App\Http\Controllers\API\LivroApiController;
use Illuminate\Support\Facades\Route;


/*Route::group([
    'prefix' => 'api',
    //'namespace' => 'App\Http\Controllers\API'
], function () {

   Route::get('/livros', [LivroApiController::class, 'index']);
});*/
Route::get('/livros', [LivroApiController::class, 'index']);
