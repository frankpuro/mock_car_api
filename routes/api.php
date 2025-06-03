<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::prefix('veiculo')->group(function () {
    Route::get('/', [ApiController::class, 'index']);
    Route::get('/{id}', [ApiController::class, 'show']);
    Route::post('/', [ApiController::class, 'store']);
    Route::put('/{id}', [ApiController::class, 'update']);
    Route::patch('/{id}', [ApiController::class, 'partialUpdate']);
    Route::delete('/{id}', [ApiController::class, 'destroy']);
});

