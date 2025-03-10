<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Sport;

class FetchSports extends Command
{
    protected $signature = 'fetch:sports';
    protected $description = 'Fetch sports from RapidAPI and store them in the database';

    public function handle()
    {
        $this->info('Fetching sports from RapidAPI...');

        // Call the API with SSL verification disabled
        $response = Http::withOptions([
            'verify' => false, // Ignore SSL verification
        ])->withHeaders([
            'x-rapidapi-host' => 'bet365-api-inplay.p.rapidapi.com',
            'x-rapidapi-key' => '34c10c04f7msh47d713914ac7f01p14285djsnd30676951206', // Replace with your actual API key
        ])->get('https://bet365-api-inplay.p.rapidapi.com/bet365/get_sports');

        if ($response->failed()) {
            $this->error('Failed to fetch sports: ' . $response->body());
            return;
        }

        $sportsData = $response->json();

        // Ensure the response is an array
        if (!is_array($sportsData)) {
            $this->error('Invalid response format');
            return;
        }

        foreach ($sportsData as $sport) {
            Sport::updateOrCreate(['name' => $sport]);
        }

        $this->info('Sports fetched and stored successfully.');
    }
}
