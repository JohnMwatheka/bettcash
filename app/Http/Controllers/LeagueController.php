<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Sport;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    /**
     * Display leagues on the welcome page.
     */
    public function index()
    {
        // Fetch all leagues
        $leagues = Sport::all();

        // Pass leagues data to the welcome view
        return view('welcome', compact('leagues'));
    }
}
