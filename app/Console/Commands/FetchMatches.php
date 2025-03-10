<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Matches;
use Carbon\Carbon;

class FetchMatches extends Command
{
    protected $signature = 'fetch:matches';
    protected $description = 'Fetch football matches from the RapidAPI and store them in the database';

    public function handle()
    {
        $this->info('Fetching matches from the RapidAPI...');

        // Make API request with increased timeout
        $response = Http::withOptions([
            'verify' => false,
            'timeout' => 120, // Increased timeout for large data
        ])->withHeaders([
            'X-Rapidapi-Key' => '34c10c04f7msh47d713914ac7f01p14285djsnd30676951206',
            'X-Rapidapi-Host' => 'premier-league18.p.rapidapi.com',
        ])->get('https://premier-league18.p.rapidapi.com/matches');

        // Handle failed request
        if ($response->failed()) {
            $this->error('Failed to fetch matches: ' . $response->body());
            return;
        }

        // Decode JSON response
        $matches = $response->json();

        // Ensure API response is valid
        if (!is_array($matches)) {
            $this->error('Invalid API response format.');
            return;
        }

        // Insert or update matches in the database
        foreach ($matches as $match) {
            // Ensure required data exists
            if (!isset($match['_id'], $match['homeTeam']['team']['_id'], $match['awayTeam']['team']['_id'])) {
                $this->warn('Skipping a match due to missing data.');
                continue;
            }

            // Fetch existing match to retain manual odds
            $existingMatch = Matches::where('match_id', (string) $match['_id'])->first();

            Matches::updateOrCreate(
                ['match_id' => (string) $match['_id']], // Ensure match_id is a string
                [
                    'league_id' => 1, // Default league ID
                    'date' => isset($match['date']) ? Carbon::parse($match['date'])->format('Y-m-d H:i:s') : null,
                    'is_finished' => isset($match['isFinished']) ? (int) $match['isFinished'] : 0,
                    'home_team_id' => (string) $match['homeTeam']['team']['_id'],
                    'home_team_name' => $match['homeTeam']['team']['name'] ?? 'Unknown',
                    'home_team_image' => $match['homeTeam']['team']['imageUrl'] ?? null,
                    'away_team_id' => (string) $match['awayTeam']['team']['_id'],
                    'away_team_name' => $match['awayTeam']['team']['name'] ?? 'Unknown',
                    'away_team_image' => $match['awayTeam']['team']['imageUrl'] ?? null,
                    'stadium' => $match['stadium'] ?? 'Unknown',
                    
                    // Preserve existing odds (if already set)
                    'odds_home_win' => $existingMatch?->odds_home_win,
                    'odds_draw' => $existingMatch?->odds_draw,
                    'odds_away_win' => $existingMatch?->odds_away_win,
                ]
            );
        }

        $this->info(count($matches) . ' matches fetched and stored successfully.');
    }
}
