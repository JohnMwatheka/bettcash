
@extends('home_layout.app')
@section('home')
	<!-- Start page wrapper -->
	<div class="page-content">
		<div class="row">
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

		<!-- Matches Container -->
		<div id="matches-container" class="py-3 my-3 mt-3 row">
			<p class="text-center">Loading matches...</p>
		</div>

		<!-- Pagination Controls -->
		<div class="mt-3 d-flex justify-content-center">
			<button id="prevPage" class="btn btn-primary me-2" disabled>Previous</button>
			<button id="nextPage" class="btn btn-primary" disabled>Next</button>
		</div>
		<!-- End row -->
	</div>
	<!-- End page content -->

@endsection


	