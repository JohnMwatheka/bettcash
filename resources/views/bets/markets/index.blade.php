@extends('bets.betsdashboard')

@section('bets')
<div class="page-content">
    <!-- Breadcrumb -->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Markets</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('markets.index') }}" class="px-5 btn btn-primary">Refresh markets</a>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Table -->
    <h6 class="mb-0 text-uppercase">Available Betting Markets</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="bettingMarketsTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Market Name</th>
                            <th>Category</th>
                            <th>Odds</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($markets as $market)
                        <tr>
                            <td>{{ $market->market_name }}</td>
                            <td>{{ $market->category }}</td>
                            <td>{{ $market->odds }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Market Name</th>
                            <th>Category</th>
                            <th>Odds</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>   
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#bettingMarketsTable').DataTable();
    });
</script>
@endsection
