<?php

use App\Http\Controllers\SportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/info', function () {
    return response()->json([
        'nome_completo' => 'Melyssa Aniceto Silva',
        'ra' => 'Seu 1380003336'
    ]);
});

Route::apiResource('/sports', SportController::class);