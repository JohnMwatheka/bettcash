@extends('bets.betsdashboard')
@section('bets')

<div class="page-content">
    <!-- Breadcrumb -->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Bets</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('multibets.index') }}" class="px-5 btn btn-primary btn-sm">Multibets</a>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table  id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Home Team</th>
                            <th>Away Team</th>
                            <th>Match Date</th>
                            <th>Match Time</th>
                            <th>Odds</th>
                            <th>Stake</th>
                            <th>Potential Payout</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bets as $key => $bet)
                        <tr data-id="{{ $bet->id }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $bet->home_team }}</td>
                            <td>{{ $bet->away_team }}</td>
                            <td>{{ $bet->match_date }}</td>
                            <td>{{ $bet->match_time }}</td>
                            <td class="odds">{{ $bet->odds }}</td> <!-- Add class for odds -->
                            <td>
                                <input type="number" class="form-control stake-input" data-id="{{ $bet->id }}" step="0.01" min="1" value="{{ $bet->stake ?? '' }}" placeholder="Enter Stake">
                            </td>
                            <td class="payout">{{ $bet->potential_payout ?? '0.00' }}</td> <!-- Class added for payout display -->
                            <td>
                                <button class="btn btn-primary confirm-stake" data-id="{{ $bet->id }}">Confirm</button>
                            </td>
                            <td>
                                <a href="{{ route('bets.show', $bet->id) }}" class="btn btn-info" title="View Details"><i class="lni lni-eye"></i></a>
                                <a href="{{ route('bets.delete', $bet->id) }}" class="btn btn-danger delete-bet" data-id="{{ $bet->id }}" title="Delete"><i class="lni lni-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Update potential payout dynamically when user enters stake
    $(document).on("input", ".stake-input", function () {
        let row = $(this).closest("tr");
        let odds = parseFloat(row.find(".odds").text());
        let stake = parseFloat($(this).val());

        if (!isNaN(stake) && !isNaN(odds)) {
            let payout = (stake * odds).toFixed(2);
            row.find(".payout").text(payout);
        } else {
            row.find(".payout").text("0.00");
        }
    });

    // Handle stake confirmation and update database via AJAX
    $(document).on("click", ".confirm-stake", function () {
        let row = $(this).closest("tr");
        let betId = $(this).data("id");
        let stake = row.find(".stake-input").val();
        let payout = row.find(".payout").text();

        if (!stake || stake <= 0) {
            alert("Please enter a valid stake.");
            return;
        }

        $.ajax({
            url: "{{ route('update.stake') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                bet_id: betId,
                stake: stake,
                potential_payout: payout
            },
            success: function (response) {
                alert(response.message);
                location.reload(); // Refresh the page to reflect changes
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert("Error updating stake. Please try again.");
            }
        });
    });

    // Delete bet confirmation
    $(document).on("click", ".delete-bet", function (e) {
        e.preventDefault();
        let betId = $(this).data("id");
        let url = "{{ route('bets.delete', ':id') }}".replace(':id', betId);

        if (confirm("Are you sure you want to delete this bet?")) {
            window.location.href = url;
        }
    });
});
</script>

@endsection
