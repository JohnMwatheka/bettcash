<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\MatchController; // Ensure this import is correct
use App\Http\Controllers\BetController;
use App\Http\Controllers\UserController;

// Welcome Route without middleware
Route::get('/', [SportsController::class, 'Index'])->withoutMiddleware([])->name('index');

// Dashboard Route with auth middleware
Route::get('/dashboard', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile Routes with auth middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/upload', [UserController::class, 'uploadProfileImage'])->name('profile.upload');
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
    Route::get('/bets/selections', [BetController::class, 'Selections'])->name('bets.selections');
    Route::get('/bets/{id}', [BetController::class, 'show'])->name('bets.show');
    Route::get('/bets/delete/{id}', [BetController::class, 'destroy'])->name('bets.delete');
    Route::post('/update-stake', [BetController::class, 'updateStake'])->name('update.stake');
    Route::get('/multibets', [BetController::class, 'multibets'])->name('multibets.index');
    Route::get('/multibets', [BetController::class, 'multibets'])->name('multibets.index');
    Route::post('/multibets/store', [BetController::class, 'storeMultibet'])->name('multibets.store');
    Route::delete('/multibets/{id}', [BetController::class, 'deleteMultibet'])->name('multibets.destroy');
    Route::get('/multibets/placed', [BetController::class, 'getPlacedMultibets'])->name('multibets.placed');


});



// Load Auth routes
require __DIR__.'/auth.php';
