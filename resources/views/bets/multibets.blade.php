@extends('bets.betsdashboard')

@section('bets')

<div class="page-content">
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Multibet</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('bets.selections') }}" class="px-5 btn btn-primary btn-sm">Single Bets</a>
            </div>
        </div>
    </div>

    <!-- Select Bets for Multibet -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Select Bets for Multibet</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Home Team</th>
                            <th>Away Team</th>
                            <th>Match Date</th>
                            <th>Match Time</th>
                            <th>Odds</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bets as $bet)
                        <tr data-id="{{ $bet->id }}">
                            <td><input type="checkbox" class="bet-checkbox" value="{{ $bet->id }}" data-odds="{{ $bet->odds }}"></td>
                            <td>{{ $bet->home_team }}</td>
                            <td>{{ $bet->away_team }}</td>
                            <td>{{ $bet->match_date }}</td>
                            <td>{{ $bet->match_time }}</td>
                            <td class="odds">{{ $bet->odds }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h5 class="mt-4 card-title">Available Betting Markets</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Market Name</th>
                            <th>Category</th>
                            <th>Odds</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bettingMarkets as $market)
                        <tr data-id="{{ $market->id }}">
                            <td><input type="checkbox" class="market-checkbox" value="{{ $market->id }}" data-odds="{{ $market->odds }}"></td>
                            <td>{{ $market->market_name }}</td>
                            <td>{{ $market->category }}</td>
                            <td class="odds">{{ $market->odds }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 col-sm-6 col-md-4 col-lg-3">
                <label for="total_stake">Total Stake:</label>
                <input type="number" id="total_stake" class="form-control" min="1" placeholder="Enter Stake amount">
            </div>
            <div class="mt-3">
                <p><strong>Total Odds:</strong> <span id="total_odds">1.00</span></p>
                <p><strong>Potential Payout:</strong> <span id="potential_payout">0.00</span></p>
            </div>
            <button class="btn btn-success" id="place_multibet">Place Multibet</button>
        </div>
    </div>
    <!-- Placed Multibets Section -->
    <div class="mt-4 card">
        <div class="card-body">
            <h5 class="card-title">My Placed Multibets</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Bets Included</th>
                            <th>Total Odds</th>
                            <th>Stake</th>
                            <th>Potential Payout</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($placedMultibets as $key => $multibet)
                        <tr data-id="{{ $multibet->id }}">
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @foreach($multibet->bets as $bet)
                                    <span class="badge bg-primary">{{ $bet->home_team }} vs {{ $bet->away_team }}</span>
                                @endforeach
                            </td>
                            <td>{{ $multibet->total_odds }}</td>
                            <td>{{ $multibet->total_stake }}</td>
                            <td>{{ $multibet->potential_payout }}</td>
                            <td>
                                <button class="btn btn-danger delete-multibet" data-id="{{ $multibet->id }}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend/assets/js/code.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    let selectedBets = [];
    let selectedMarkets = [];

    function updateTotalOdds() {
        // Calculate total odds from selected bets
        let totalOddsBets = selectedBets.reduce((acc, bet) => acc * parseFloat(bet.odds), 1);

        // Calculate total odds from selected markets
        let totalOddsMarkets = selectedMarkets.reduce((acc, market) => acc * parseFloat(market.odds), 1);

        // Combine total odds
        let totalOdds = (totalOddsBets * totalOddsMarkets).toFixed(2);
        $("#total_odds").text(totalOdds);

        // Calculate potential payout
        let stake = parseFloat($("#total_stake").val());
        let potentialPayout = stake ? (stake * totalOdds).toFixed(2) : "0.00";
        $("#potential_payout").text(potentialPayout);
    }

    // Handle bet selection
    $(".bet-checkbox").change(function () {
        let betId = $(this).val();
        let odds = $(this).data("odds");

        if ($(this).is(":checked")) {
            selectedBets.push({ id: betId, odds: odds });
        } else {
            selectedBets = selectedBets.filter(bet => bet.id != betId);
        }

        updateTotalOdds();
    });

    // Handle market selection
    $(".market-checkbox").change(function () {
        let marketId = $(this).val();
        let odds = $(this).data("odds");

        if ($(this).is(":checked")) {
            selectedMarkets.push({ id: marketId, odds: odds });
        } else {
            selectedMarkets = selectedMarkets.filter(market => market.id != marketId);
        }

        updateTotalOdds();
    });

    // Handle stake input
    $("#total_stake").on("input", function () {
        updateTotalOdds();
    });

    // Place multibet
    $("#place_multibet").click(function () {
        if (selectedBets.length + selectedMarkets.length < 2) {
            Swal.fire('Error', 'Please select at least two bets or markets for a multibet.', 'error');
            return;
        }

        let stake = $("#total_stake").val();
        let totalOdds = $("#total_odds").text();
        let potentialPayout = $("#potential_payout").text();

        if (!stake || stake <= 0) {
            Swal.fire('Error', 'Enter a valid stake amount.', 'error');
            return;
        }

        $.ajax({
            url: "{{ route('multibets.store') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                bet_ids: selectedBets.map(bet => bet.id),
                market_ids: selectedMarkets.map(market => market.id),
                total_stake: stake,
                total_odds: totalOdds,
                potential_payout: potentialPayout
            },
            success: function (response) {
                Swal.fire('Success', response.message, 'success').then(() => {
                    location.reload();
                });
            },
            error: function () {
                Swal.fire('Error', 'Error placing multibet. Try again.', 'error');
            }
        });
    });

    // DELETE MULTIBET WITH SWEETALERT
    $(document).on("click", ".delete-multibet", function () {
        let multibetId = $(this).data("id");

        Swal.fire({
            title: 'Are you sure?',
            text: "This will permanently delete the multibet!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/multibets/" + multibetId,
                    method: "DELETE",
                    data: { _token: "{{ csrf_token() }}" },
                    success: function (response) {
                        Swal.fire('Deleted!', response.message, 'success').then(() => {
                            location.reload();
                        });
                    },
                    error: function () {
                        Swal.fire('Error', 'Error deleting multibet.', 'error');
                    }
                });
            }
        });
    });
});

</script>


