<?php

namespace App\Http\Controllers;

use App\Models\Solitaire;
use Illuminate\Http\Request;

class SolitaireController extends Controller
{
    public function index()
    {
        $leaderboard = Solitaire::orderByDesc('score')->orderByDesc('time')->limit(10)->get();
        return response()->json(['message' => 'Top 10 leaderboard', 'data' => $leaderboard]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'score' => 'required|int',
            'time' => 'required|string'
        ]);

        Solitaire::create($validated);
        return response()->json(['message' => 'leaderboard updated'], 201);
    }
}
