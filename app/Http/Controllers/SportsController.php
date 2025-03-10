<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SportsController extends Controller
{
    /**
     * Display all sports.
     */
    public function index()
    {
        // Fetch all sports
        $sports = Sport::all();

        // Pass sports data to the view
        return view('welcome', compact('sports'));
    }

    /**
     * Display leagues for a specific sport.
     *
     * @param int $sportId
     */
    public function fetchLeagues($sportId)
{
    try {
        $sport = Sport::findOrFail($sportId);
        $leagues = $sport->leagues;

        return response()->json(['status' => 'success', 'data' => $leagues], 200);
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return response()->json(['status' => 'error', 'message' => 'An error occurred while fetching leagues.'], 500);
    }
}

}
