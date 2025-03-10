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
                <a href="{{ route('bets.selections') }}" class="px-5 btn btn-primary">Refresh Bets</a>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    
</div>


@endsection
        
   

