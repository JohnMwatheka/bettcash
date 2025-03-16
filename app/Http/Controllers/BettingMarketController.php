<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BettingMarket;

class BettingMarketController extends Controller
{
    /**
     * Display a list of all betting markets in a Blade view.
     */
    public function index()
    {
        $markets = BettingMarket::all();
        return view('bets.markets.index', compact('markets'));
    }

    /**
     * Display a specific betting market in a Blade view.
     */
    public function show($id)
    {
        $market = BettingMarket::find($id);

        if (!$market) {
            return redirect()->route('betting-markets.index')->with('error', 'Market not found');
        }

        return view('betting_markets.show', compact('market'));
    }
}
