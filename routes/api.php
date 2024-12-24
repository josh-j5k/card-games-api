<?php

use App\Models\Solitaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/leaderboard', function () {
    $arr = [
        ['time' => '05:04', 'score' => 2450, 'name' => 'josh'],
        ['time' => '04:04', 'score' => 4500, 'name' => 'josh'],
        ['time' => '07:04', 'score' => 1450, 'name' => 'josh'],
        ['time' => '05:55', 'score' => 2300, 'name' => 'josh'],
        ['time' => '05:04', 'score' => 2450, 'name' => 'josh'],
        ['time' => '05:04', 'score' => 2450, 'name' => 'josh'],
        ['time' => '05:04', 'score' => 2450, 'name' => 'josh'],
        ['time' => '05:04', 'score' => 2450, 'name' => 'josh'],


    ];
    foreach ($arr as $val) {
        Solitaire::create([
            'name' => $val['name'],
            'score' => $val['score'],
            'time' => $val['time']
        ]);
    }
    return response()->json(['message' => 'successful'], 200);
});

Route::get('/leaderboards', function () {
    $all = Solitaire::all();
    return response()->json($all, 200);
});