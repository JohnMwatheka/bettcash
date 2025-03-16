
@extends('market_layout.app')
@section('markets')
	<!-- Start page wrapper -->
	<div class="page-content">
        <div class="mb-3 row">
			<!-- Carousel Section -->
			<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="h-10 rounded d-block w-100" src="assets/images/gallery/banner1 (1).jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="h-10 rounded d-block w-100" src="assets/images/gallery/banner1 (2).jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="h-10 rounded d-block w-100" src="assets/images/gallery/banner1 (3).jpg" alt="Third slide">
					</div>
				</div>
			</div>
		</div>
		<!-- Matches Section -->
        <div id="matches-container" class="row">
            @foreach ($matches as $match)
                <div class="mb-3 col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="border-0 rounded shadow sports-card">
                        <!-- Match Header -->
                        <div class="sports-card__head d-flex justify-content-between align-items-center">
                            <!-- Home Team -->
                            <div class="sports-card__team">
                                <span class="sports-card__team-flag">
                                    <img src="{{ $match->home_team_image }}" alt="Home Team" width="30">
                                </span>
                                <span class="sports-card__team-name bold text-capitalize">{{ $match->home_team_name }}</span>
                            </div>
                            
                            <!-- Match Info -->
                            <div class="text-center sports-card__info">
                                <span class="sports-card__info-time fs-6">
                                    {{ \Carbon\Carbon::parse($match->date)->format('Y-m-d') }} <br>
                                    {{ \Carbon\Carbon::parse($match->date)->format('H:i:s') }}
                                </span>
                            </div>
                            
                            <!-- Away Team -->
                            <div class="sports-card__team">
                                <span class="sports-card__team-flag">
                                    <img src="{{ $match->away_team_image }}" alt="Away Team" width="30">
                                </span>
                                <span class="sports-card__team-name bold text-capitalize">{{ $match->away_team_name }}</span>
                            </div>
                        </div>        
                        <!-- Scrollable Odds Row -->
                        <div class="py-1 my-1 odds-scroll-container">
                            @forelse ($bettingMarkets as $market)
                                <p class="mr-2 odds-btn text-primary"
                                        data-home="{{ $match->home_team_name }}"
                                        data-away="{{ $match->away_team_name }}"
                                        data-date="{{ \Carbon\Carbon::parse($match->date)->format('Y-m-d') }}"
                                        data-time="{{ \Carbon\Carbon::parse($match->date)->format('H:i:s') }}"
                                        data-odds="{{ $market->odds }}">
                                    {{ $market->short_name }}: {{ $market->odds }}
                                </p>
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
	<!-- End page content -->

@endsection


	