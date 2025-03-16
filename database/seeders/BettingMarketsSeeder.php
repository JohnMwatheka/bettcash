<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BettingMarketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $markets = [
            // Match Result Markets
            [
                'category' => 'Match Result',
                'market_name' => 'Full-Time Result - Home Win',
                'short_name' => 'FT_HomeWin',
                'description' => 'Bet on the home team to win the match.',
                'odds' => 1.90,
            ],
            [
                'category' => 'Match Result',
                'market_name' => 'Full-Time Result - Draw',
                'short_name' => 'FT_Draw',
                'description' => 'Bet on the match to end in a draw.',
                'odds' => 3.20,
            ],
            [
                'category' => 'Match Result',
                'market_name' => 'Full-Time Result - Away Win',
                'short_name' => 'FT_AwayWin',
                'description' => 'Bet on the away team to win the match.',
                'odds' => 4.50,
            ],
            [
                'category' => 'Match Result',
                'market_name' => 'Double Chance - 1X',
                'short_name' => 'DC_1X',
                'description' => 'Bet on the home team to win or draw.',
                'odds' => 1.30,
            ],
            [
                'category' => 'Match Result',
                'market_name' => 'Double Chance - X2',
                'short_name' => 'DC_X2',
                'description' => 'Bet on the away team to win or draw.',
                'odds' => 1.50,
            ],
            [
                'category' => 'Match Result',
                'market_name' => 'Double Chance - 12',
                'short_name' => 'DC_12',
                'description' => 'Bet on either team to win (no draw).',
                'odds' => 1.20,
            ],

            // Goals Markets
            [
                'category' => 'Goals',
                'market_name' => 'Over 2.5 Goals',
                'short_name' => 'Over_2.5',
                'description' => 'Bet on the match having more than 2.5 goals.',
                'odds' => 1.75,
            ],
            [
                'category' => 'Goals',
                'market_name' => 'Under 2.5 Goals',
                'short_name' => 'Under_2.5',
                'description' => 'Bet on the match having less than 2.5 goals.',
                'odds' => 2.10,
            ],
            [
                'category' => 'Goals',
                'market_name' => 'Both Teams to Score - Yes',
                'short_name' => 'BTTS_Yes',
                'description' => 'Bet on both teams scoring at least one goal.',
                'odds' => 1.85,
            ],
            [
                'category' => 'Goals',
                'market_name' => 'Both Teams to Score - No',
                'short_name' => 'BTTS_No',
                'description' => 'Bet on at least one team not scoring.',
                'odds' => 1.95,
            ],

            // Cards Markets
            [
                'category' => 'Cards',
                'market_name' => 'Total Yellow Cards Over 2.5',
                'short_name' => 'YCards_Over_2.5',
                'description' => 'Bet on the match having more than 2.5 yellow cards.',
                'odds' => 2.40,
            ],
            [
                'category' => 'Cards',
                'market_name' => 'Total Yellow Cards Under 2.5',
                'short_name' => 'YCards_Under_2.5',
                'description' => 'Bet on the match having less than 2.5 yellow cards.',
                'odds' => 1.80,
            ],

            // Special Markets
            [
                'category' => 'Special',
                'market_name' => 'VAR Decision Overturned? - Yes',
                'short_name' => 'VAR_Yes',
                'description' => 'Bet on a VAR decision being overturned in the match.',
                'odds' => 3.50,
            ],
            [
                'category' => 'Special',
                'market_name' => 'VAR Decision Overturned? - No',
                'short_name' => 'VAR_No',
                'description' => 'Bet on no VAR decisions being overturned in the match.',
                'odds' => 1.40,
            ]
        ];

        // Insert markets into the database
        foreach ($markets as &$market) {
            $market['created_at'] = now();
            $market['updated_at'] = now();
        }

        DB::table('betting_markets')->insert($markets);
    }
}
