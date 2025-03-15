<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
use Carbon\Carbon;

class MatchController extends Controller
{
    public function fetchMatches(Request $request)
    {
        $perPage = 50; // Number of matches per page
        $page = $request->query('page', 1); // Get the current page from the request

        // Fetch all matches (both upcoming and played) and paginate them
        $matches = Matches::orderBy('date', 'asc')
            ->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'data' => $this->formatMatches($matches),
            'current_page' => $matches->currentPage(),
            'last_page' => $matches->lastPage(),
        ]);
    }

    private function formatMatches($matches)
    {
        return $matches->map(function ($match) {
            return [
                'match_id' => $match->match_id,
                'league_id' => $match->league_id,
                'date' => Carbon::parse($match->date)->toDateString(), // Extracting only the date (YYYY-MM-DD)
                'time' => Carbon::parse($match->date)->toTimeString(), // Extracting only the time (HH:MM:SS)
                'is_finished' => $match->is_finished,
                'home_team_id' => $match->home_team_id,
                'home_team_name' => $match->home_team_name,
                'home_team_image' => $match->home_team_image,
                'away_team_id' => $match->away_team_id,
                'away_team_name' => $match->away_team_name,
                'away_team_image' => $match->away_team_image,
                'stadium' => $match->stadium ?? 'TBD',
                'odds_home_win' => $match->odds_home_win ?? 'N/A',
                'odds_draw' => $match->odds_draw ?? 'N/A',
                'odds_away_win' => $match->odds_away_win ?? 'N/A',
                'created_at' => $match->created_at,
                'updated_at' => $match->updated_at,
            ];
        });
    }
}