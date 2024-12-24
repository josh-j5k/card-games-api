<?php

use App\Http\Controllers\SolitaireController;
use App\Models\Solitaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('solitaire')->group(function () {
    Route::get('/leaderboard', [SolitaireController::class, 'index']);
    Route::post('/leaderboard', [SolitaireController::class, 'store']);
});