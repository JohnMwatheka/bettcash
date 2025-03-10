<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\League;

class FetchLeagues extends Command
{
    protected $signature = 'fetch:leagues';
    protected $description = 'Fetch football leagues from the new RapidAPI and store them in the database';

    public function handle()
    {
        $this->info('Fetching leagues from the new RapidAPI...');

        // Make the API request
        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'X-Rapidapi-Key' => '34c10c04f7msh47d713914ac7f01p14285djsnd30676951206',
            'X-Rapidapi-Host' => 'free-api-live-football-data.p.rapidapi.com',
        ])->get('https://free-api-live-football-data.p.rapidapi.com/football-get-all-leagues');

        // Handle failed request
        if ($response->failed()) {
            $this->error('Failed to fetch leagues: ' . $response->body());
            return;
        }

        // Decode JSON response
        $responseData = $response->json();

        // Ensure API response is valid
        if (!isset($responseData['status']) || $responseData['status'] !== 'success' || 
            !isset($responseData['response']['leagues']) || !is_array($responseData['response']['leagues'])) {
            $this->error('Invalid API response format.');
            return;
        }

        // Fetch leagues array
        $leagues = $responseData['response']['leagues'];

        // Insert or update leagues in the database
        foreach ($leagues as $league) {
            League::updateOrCreate(
                ['id' => $league['id']],
                [
                    'name' => $league['name'] ?? 'Unknown',
                    'localized_name' => $league['localizedName'] ?? 'Unknown',
                    'logo' => $league['logo'] ?? null,
                    'sport_id' => 1,
                ]
            );
        }

        $this->info(count($leagues) . ' leagues fetched and stored successfully.');
    }
}
