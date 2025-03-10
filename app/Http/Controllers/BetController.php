<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bet;
use Illuminate\Support\Facades\Log;

class BetController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'bets' => 'required|array|min:1',
            'bets.*.home_team' => 'required|string',
            'bets.*.away_team' => 'required|string',
            'bets.*.match_date' => 'required|date',
            'bets.*.match_time' => 'required|string',
            'bets.*.odds' => 'required|numeric',
        ]);

        $user = Auth::user(); // Get the authenticated user

        // Concatenate the full name
        $fullName = trim($user->first_name . ' ' . ($user->middle_name ?? '') . ' ' . $user->last_name);

        foreach ($request->bets as $bet) {
            Bet::create([
                'user_id' => $user->id,
                'user_name' => $fullName, // Corrected to store full name
                'user_phone' => $user->phone, // Ensure user_phone is stored
                'home_team' => $bet['home_team'],
                'away_team' => $bet['away_team'],
                'match_date' => $bet['match_date'],
                'match_time' => $bet['match_time'],
                'odds' => $bet['odds'],
            ]);
        }

        return response()->json(['message' => 'Bet placed successfully'], 200);
    }
}
