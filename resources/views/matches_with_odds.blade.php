<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-auth" content="{{ Auth::check() ? 'authenticated' : 'guest' }}">
    <title>Matches with Odds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Scrollable Odds Row */
        .odds-scroll-container {
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
            gap: 8px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
            scroll-behavior: smooth;
        }

        .odds-scroll-container::-webkit-scrollbar {
            height: 6px;
        }

        .odds-scroll-container::-webkit-scrollbar-thumb {
            background: #007bff;
            border-radius: 3px;
        }

        .odds-btn {
            flex: 0 0 auto;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4 text-center">Matches with Odds</h1>

    <!-- Matches Section -->
    <div id="matches-container" class="row">
        @foreach ($matches as $match)
            <div class="mb-3 col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="border-0 rounded shadow sports-card">
                    <!-- Match Header -->
                    <div class="p-3 sports-card__head d-flex justify-content-between align-items-center bg-light">
                        <div class="d-flex align-items-center">
                            <img src="{{ $match->home_team_image }}" alt="Home Team" class="me-2" width="30">
                            <span class="bold text-capitalize">{{ $match->home_team_name }}</span>
                        </div>
                        <div class="text-center">
                            <span class="fs-6">{{ \Carbon\Carbon::parse($match->date)->format('Y-m-d') }}</span><br>
                            <span class="fs-6">{{ \Carbon\Carbon::parse($match->date)->format('H:i:s') }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{ $match->away_team_image }}" alt="Away Team" class="me-2" width="30">
                            <span class="bold text-capitalize">{{ $match->away_team_name }}</span>
                        </div>
                    </div>

                    <!-- Scrollable Odds Row -->
                    <div class="mt-3 odds-scroll-container">
                        @forelse ($bettingMarkets as $market)
                            <button class="btn btn-outline-primary odds-btn"
                                    data-home="{{ $match->home_team_name }}"
                                    data-away="{{ $match->away_team_name }}"
                                    data-date="{{ \Carbon\Carbon::parse($match->date)->format('Y-m-d') }}"
                                    data-time="{{ \Carbon\Carbon::parse($match->date)->format('H:i:s') }}"
                                    data-odds="{{ $market->odds }}">
                                {{ $market->short_name }}: {{ $market->odds }}
                            </button>
                        @empty
                            <span class="text-muted">No odds available</span>
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-between align-items-center">
        @if ($matches->currentPage() > 1)
            <a href="{{ $matches->previousPageUrl() }}" class="btn btn-primary">Previous</a>
        @else
            <button class="btn btn-secondary" disabled>Previous</button>
        @endif

        <span>Page {{ $matches->currentPage() }} of {{ $matches->lastPage() }}</span>

        @if ($matches->hasMorePages())
            <a href="{{ $matches->nextPageUrl() }}" class="btn btn-primary">Next</a>
        @else
            <button class="btn btn-secondary" disabled>Next</button>
        @endif
    </div>
</div>

<!-- Betslip Modal -->
<div class="modal fade" id="betslip" tabindex="-1" aria-labelledby="betslipLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="betslipLabel">Your Bet Slip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="betslip-content" class="list-group"></ul>
            </div>
            <div class="modal-footer">
                <button id="place-bet-btn" class="btn btn-success">Place Bet</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
let betSlip = [];

function updateBetSlip() {
    let betslipHtml = '';
    
    if (betSlip.length === 0) {
        betslipHtml = '<p class="text-center">No bets added yet.</p>';
    } else {
        betSlip.forEach((bet, index) => {
            betslipHtml += `
                <li class="list-group-item d-flex justify-content-between align-items-center bet-slip-item">
                    <div>
                        <strong>${bet.home_team} vs ${bet.away_team}</strong><br>
                        ${bet.match_date} - ${bet.match_time} <br>
                        <span class="badge bg-success">Odds: ${bet.odds}</span>
                    </div>
                    <button class="btn btn-danger btn-sm" onclick="removeBet(${index})">Remove</button>
                </li>`;
        });
    }
    $('#betslip-content').html(betslipHtml);
}

function addToBetSlip(home, away, date, time, odds) {
    betSlip.push({
        home_team: home,
        away_team: away,
        match_date: date,
        match_time: time,
        odds: odds
    });

    updateBetSlip();
    $('#betslip').modal('show');
}

function removeBet(index) {
    betSlip.splice(index, 1);
    updateBetSlip();
}

// Check if user is authenticated
function isAuthenticated() {
    return $('meta[name="user-auth"]').attr("content") === "authenticated";
}

// Add bet when odds button is clicked
$(document).on('click', '.odds-btn', function () {
    const home_team = $(this).data('home');
    const away_team = $(this).data('away');
    const date = $(this).data('date');
    const time = $(this).data('time');
    const odds = $(this).data('odds');

    addToBetSlip(home_team, away_team, date, time, odds);
});

// Place Bet Button
$(document).on("click", "#place-bet-btn", function () {
    if (betSlip.length === 0) {
        alert("No bets selected!");
        return;
    }

    if (!isAuthenticated()) {
        alert("Please log in to place a bet.");
        window.location.href = "/login";
        return;
    }

    $.ajax({
        url: "/bets/store",
        type: "POST",
        data: JSON.stringify({ bets: betSlip }),
        contentType: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            alert(response.message);
            betSlip = [];
            updateBetSlip();
            $('#betslip').modal('hide');
        },
        error: function (xhr) {
            console.error(xhr.responseJSON);
            alert("Error placing bet. Check console for details.");
        },
    });
});
</script>
</body>
</html>
