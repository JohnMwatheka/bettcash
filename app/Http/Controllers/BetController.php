<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bet;
use App\Models\Multibet;
use App\Models\BettingMarket; // Add this line

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

        $user = Auth::user();
        $fullName = trim($user->first_name . ' ' . ($user->middle_name ?? '') . ' ' . $user->last_name);

        foreach ($request->bets as $bet) {
            Bet::create([
                'user_id' => $user->id,
                'user_name' => $fullName,
                'user_phone' => $user->phone,
                'home_team' => $bet['home_team'],
                'away_team' => $bet['away_team'],
                'match_date' => $bet['match_date'],
                'match_time' => $bet['match_time'],
                'odds' => $bet['odds'],
            ]);
        }

        return response()->json(['message' => 'Bet placed successfully'], 200);
    }

    public function Selections()
    {
        $bets = Bet::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('bets.selections', compact('bets'));
    }

    public function show($id)
    {
        $bet = Bet::findOrFail($id);
        return view('bets.show', compact('bet'));
    }

    public function destroy($id)
    {
        $bet = Bet::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $bet->delete();
        return redirect()->route('bets.selections')->with('success', 'Bet deleted successfully.');
    }

    public function multibets()
    {
        // Fetch bets and betting markets
        $bets = Bet::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $bettingMarkets = BettingMarket::all(); // Fetch all betting markets
        $placedMultibets = Multibet::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('bets.multibets', compact('bets', 'bettingMarkets', 'placedMultibets'));
    }
    public function storeMultibet(Request $request)
    {
        $request->validate([
            'bet_ids' => 'nullable|array', // Allow bet_ids to be nullable
            'market_ids' => 'nullable|array', // Add validation for market_ids
            'total_stake' => 'required|numeric|min:1',
            'total_odds' => 'required|numeric|min:1',
            'potential_payout' => 'required|numeric|min:1',
        ]);

        // Ensure at least two selections (bets or markets)
        $totalSelections = count($request->bet_ids ?? []) + count($request->market_ids ?? []);
        if ($totalSelections < 2) {
            return response()->json(['message' => 'Please select at least two bets or markets for a multibet.'], 422);
        }

        $user = Auth::user();
        $multibet = Multibet::create([
            'user_id' => $user->id,
            'total_stake' => $request->total_stake,
            'total_odds' => $request->total_odds,
            'potential_payout' => $request->potential_payout,
        ]);

        // Attach selected bets (if any)
        if ($request->bet_ids) {
            $bets = Bet::whereIn('id', $request->bet_ids)->get();
            foreach ($bets as $bet) {
                $multibet->bets()->attach($bet->id);
            }
        }

        // Attach selected markets (if any)
        if ($request->market_ids) {
            $markets = BettingMarket::whereIn('id', $request->market_ids)->get();
            foreach ($markets as $market) {
                $multibet->markets()->attach($market->id);
            }
        }

        return response()->json(['message' => 'Multibet placed successfully']);
    }

    public function deleteMultibet($id)
    {
        $multibet = Multibet::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $multibet->bets()->detach(); // Detach all related bets
        $multibet->markets()->detach(); // Detach all related markets
        $multibet->delete();

        return response()->json(['message' => 'Multibet deleted successfully']);
    }
}