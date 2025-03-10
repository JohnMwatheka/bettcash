<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\MatchController; // Ensure this import is correct
use App\Http\Controllers\BetController;

// Welcome Route without middleware
Route::get('/welcome', [SportsController::class, 'Index'])->withoutMiddleware([])->name('index');

// Dashboard Route with auth middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes with auth middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Match Routes
Route::get('/matches', [MatchController::class, 'fetchMatches'])->name('matches.index'); // Fetch all matches
Route::get('/matches/upcoming', [MatchController::class, 'fetchUpcoming'])->name('matches.upcoming'); // Fetch upcoming matches
Route::get('/matches/played', [MatchController::class, 'fetchPlayed'])->name('matches.played'); // Fetch played matches

// Login Route
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::get('/register', function () {
    return view('auth.register');
})->name('register')->middleware('guest');


Route::middleware('auth')->group(function () {
    Route::post('/bets/store', [BetController::class, 'store'])->name('bets.store');
});



// Load Auth routes
require __DIR__.'/auth.php';
