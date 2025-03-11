<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">




	<!--plugins-->
	<link href="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href=" {{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
	<!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet"/>
	<script src="{{asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/dark-theme.css')}}"/>
	<link rel="stylesheet" href="{{asset('assets/css/semi-dark.css')}}"/>
	<link rel="stylesheet" href="{{asset('assets/css/header-colors.css')}}"/>


	<!-- Datables  css-->
	<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />

	<!--Toastr css. It show alerts during validation-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
	<title>Bettcash</title>
	<!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<style>
		.sidebar-wrapper a {
    text-decoration: none !important;
		}
		.sports-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            background-color: #fff;
            height: 100%;
        }
        .sports-card__head {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sports-card__team {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sports-card__team-flag img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 8px;
        }

		.sports-card__odds {
			display: flex;
			justify-content: center;
			align-items: center;
			
		}

        

	</style>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">

		<!--sidebar wrapper -->
			<div class="sidebar-wrapper" data-simplebar="true">
				<div class="sidebar-header">
					<div>
						<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
					</div>
					<div>
						<h4 class="logo-text">Bettcash</h4>
					</div>
					<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i></div>
				</div>

				<!-- Navigation -->
				<ul class="metismenu text-decoration-none" id="menu">
					<li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class='bx bx-calendar-event'></i></div>
							<div class="menu-title">Matches</div>
						</a>
						<ul>
							<li> <a href="#" id="showUpcoming"><i class='bx bx-time-five'></i> Prematch</a></li>
							<li> <a href="#" id="showPlayed"><i class='bx bx-play-circle'></i> Live</a></li>
						</ul>
					</li>
					@foreach ($sports as $sport)
						<li>
							<a href="javascript:;" class="has-arrow">
								<div class="parent-icon">
									@if(strtolower($sport->name) == 'soccer') <i class='bx bx-football'></i>
									@elseif(strtolower($sport->name) == 'basketball') <i class='bx bx-basketball'></i>
									@elseif(strtolower($sport->name) == 'tennis') <i class='bx bx-tennis-ball'></i>
									@elseif(strtolower($sport->name) == 'baseball') <i class='bx bx-baseball'></i>
									@elseif(strtolower($sport->name) == 'american football') <i class='bx bx-football'></i>
									@elseif(strtolower($sport->name) == 'volleyball') <i class='bx bx-volleyball'></i>
									@elseif(strtolower($sport->name) == 'ice hockey') <i class='bx bx-hockey'></i>
									@elseif(strtolower($sport->name) == 'cricket') <i class='bx bx-cricket-ball'></i>
									@elseif(strtolower($sport->name) == 'horse racing') <i class='bx bx-horse'></i>
									@elseif(strtolower($sport->name) == 'handball') <i class='bx bx-hand'></i>
									@elseif(strtolower($sport->name) == 'e-sports') <i class='bx bx-joystick'></i>
									@else <i class='bx bx-trophy'></i> {{-- Default icon --}}
									@endif
								</div>
								<div class="menu-title text-capitalize">{{ $sport->name }}</div>
							</a>
							<ul>
								@foreach ($sport->leagues as $league)
									<li>
										<a href="" class="d-flex align-items-center text-decoration-none">
											<img src="{{ $league->logo }}" alt="{{ $league->name }} Logo" 
												class="img-thumbnail me-2" 
												style="width: 25px; height: 25px; border-radius: 50%;">
											<span>{{ $league->name }}</span>
										</a>
									</li>
								@endforeach
							</ul>
						</li>
					@endforeach
				</ul>
				<!-- End Navigation -->
			</div>
			<!--end sidebar wrapper -->


		

		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="gap-3 navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
		
					  <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
						<input class="px-5 form-control" disabled type="search" placeholder="Search">
						<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 fs-5"><i class='bx bx-search'></i></span>
					  </div>
		
		
					  <div class="top-menu ms-auto">
						<ul class="gap-1 navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;" data-bs-toggle="dropdown"><img src="assets/images/county/02.png" width="22" alt="">
								</a>
								<ul class="dropdown-menu dropdown-menu-end">
									<li><a class="py-2 dropdown-item d-flex align-items-center" href="javascript:;"><img src="assets/images/county/01.png" width="20" alt=""><span class="ms-2">English</span></a>
									</li>                           
								</ul>
							</li>
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>
		
							<li class="nav-item dropdown dropdown-app">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="javascript:;"><i class='bx bx-grid-alt'></i></a>
								<div class="p-0 dropdown-menu dropdown-menu-end">
									<div class="p-2 my-2 app-container">
									  <div class="p-2 row gx-0 gy-2 row-cols-3 justify-content-center">
										 <div class="col">
										  <a href="javascript:;">
											<div class="text-center app-box">
											  <div class="app-icon">
												  <img src="{{ asset('assets/images/app/slack.png') }}" width="30" alt="">
											  </div>
											  <div class="app-name">
												  <p class="mt-1 mb-0">Slack</p>
											  </div>
											  </div>
											</a>
										 </div>
				
									  </div><!--end row-->
				
									</div>
								</div>
							</li>
		
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown"><span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-badge">8 New</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson<span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<button class="btn btn-primary w-100">View All Notifications</button>
										</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-shopping-bag'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">My Cart</p>
											<p class="msg-header-badge">10 Items</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="gap-3 d-flex align-items-center">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="{{ asset('assets/images/products/11.png') }}" class="" alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="mb-0 cart-product-title">Men White T-Shirt</h6>
													<p class="mb-0 cart-product-price">1 X $29.00</p>
												</div>
												<div class="">
													<p class="mb-0 cart-price">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<div class="mb-3 d-flex align-items-center justify-content-between">
												<h5 class="mb-0">Total</h5>
												<h5 class="mb-0 ms-auto">$489.00</h5>
											</div>
											<button class="btn btn-primary w-100">Checkout</button>
										</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="px-3 user-box dropdown">
						@auth
							<!-- Logged-in User View -->
							<a class="gap-3 d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="{{ asset('assets/upload/users/' . ($userData->profile_image ?? 'default_user_img.jpeg')) }}" class="user-img" alt="user avatar">
								<div class="user-info">
									<p class="mb-0 user-name">{{ Auth::user()->first_name}}</p>
									<p class="mb-0 designattion">{{ Auth::user()->last_name}}</p>
								</div>
							</a>
							<ul class="dropdown-menu dropdown-menu-end">
								<li><a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}"><i class="bx bx-user fs-5"></i><span>Profile</span></a></li>
								<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-cog fs-5"></i><span>Settings</span></a></li>
								<li><a class="dropdown-item d-flex align-items-center" href="{{ route('dashboard') }}"><i class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a></li>
								<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-dollar-circle fs-5"></i><span>Earnings</span></a></li>
								<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-download fs-5"></i><span>Downloads</span></a></li>
								<li><div class="mb-0 dropdown-divider"></div></li>
								<li>
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<a class="dropdown-item d-flex align-items-center" href="{{ route('login') }}" 
											onclick="event.preventDefault(); this.closest('form').submit();">
											<i class="bx bx-log-out-circle"></i><span>Logout</span>
										</a>
									</form>
								</li>
							</ul>
						@else
							<!-- Guest User View (Show User Icon Instead of Avatar) -->
							<a class="gap-3 d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bx bx-user fs-2"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-end">
								<li><a class="dropdown-item d-flex align-items-center" href="{{ route('login') }}"><i class="bx bx-log-in-circle fs-5"></i><span>Login</span></a></li>
								<li><a class="dropdown-item d-flex align-items-center" href="{{ route('register') }}"><i class="bx bx-user-plus fs-5"></i><span>Register</span></a></li>
							</ul>
						@endauth
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
                <div class="row">
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

				<div id="matches-container" class="py-3 my-3 mt-3 row">
					<p class="text-center">Loading matches...</p>
				</div>
				
                <!--end row-->

				 </div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © <span id="year"></span>. All rights reserved.</p>
		</footer>		
	</div>
	<!--end wrapper-->


	<!-- search modal -->
	<!-- Modal for Bet Slip -->
		<div class="modal fade" id="betslip" tabindex="-1" aria-labelledby="betslipLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="betslipLabel">Bet Slip</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<ul id="betslip-content" class="list-group">

						</ul>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="place-bet-btn">Save selections</button>
					</div>
				</div>
			</div>
		</div>
		<!-- end search modal -->
	




	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('assets/plugins/chartjs/js/chart.js')}}"></script>
	<script src="{{asset('assets/js/index.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/validate.min.js')}}"></script>
    <script src="{{ asset('assets/js/code.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


	<!-- Data Table Javascript. It enables the search functionality and the next page functionality-->
	<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	  <!-- End Data Table-->
      <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<!--app JS-->
	<script>
		new PerfectScrollbar(".app-container");
	</script>

<script>
	let allMatches = [];

	function fetchMatches() {
		$.ajax({
			url: '/matches',
			method: 'GET',
			success: function(response) {
				allMatches = [...response.upcoming, ...response.played];
				renderMatches(allMatches);
			},
			error: function(xhr) {
				console.error(xhr.responseText);
				alert('An error occurred while fetching matches.');
			}
		});
	}

	function renderMatches(matches) {
				let htmlContent = '';
				if (matches.length === 0) {
					htmlContent = `<p class='text-center'>No matches available.</p>`;
				} else {
					matches.forEach(match => {
						htmlContent += `
							<div class="mb-3 col-12 col-sm-6 col-md-4 col-lg-4">
								<div class="border-0 rounded shadow sports-card">
									<div class="sports-card__head">
										<span class="sports-card__team">
											<span class="sports-card__team-flag">
												<img src="${match.home_team_image}" alt="Home Team">
											</span>
											<span class="sports-card__team-name">${match.home_team_name}</span>
										</span>
										<span class="sports-card__info">
											<span class="sports-card__info-time fs-0.1">${match.date} <br />${match.time}</span>
										</span>
										<span class="sports-card__team">
											<span class="sports-card__team-flag">
												<img src="${match.away_team_image}" alt="Away Team">
											</span>
											<span class="sports-card__team-name">${match.away_team_name}</span>
										</span>
									</div>
									<div class="p-2 mt-3 text-center sports-card__odds bg-light">
										<span class="me-3"><strong>Home:</strong> <span class="odds-btn">${match.odds_home_win}</span></span>
										<span class="me-3"><strong>Draw:</strong> <span class="odds-btn">${match.odds_draw}</span></span>
										<span class="me-3"><strong>Win:</strong> <span class="odds-btn">${match.odds_away_win}</span></span>
									</div>
								</div>
							</div>
						`;
					});
				}
				$('#matches-container').html(htmlContent);
			}


			$(document).ready(function() {
    fetchMatches();

    $('#showAll').click(function() {
        renderMatches(allMatches);
    });

    $('#showUpcoming').click(function() {
        const upcomingMatches = allMatches.filter(match => parseInt(match.is_finished) === 0);
        renderMatches(upcomingMatches);
    });

    $('#showPlayed').click(function() {
        const playedMatches = allMatches.filter(match => parseInt(match.is_finished) === 1);
        renderMatches(playedMatches);
    });
});

</script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
  let betSlip = [];

function updateBetSlip() {
    let betslipHtml = '';
    let totalOdds = 1;

    if (betSlip.length === 0) {
        betslipHtml = '<p class="text-center">No bets added yet.</p>';
    } else {
        betSlip.forEach((bet, index) => {
            totalOdds *= parseFloat(bet.odds);
            betslipHtml += `
                <li class="list-group-item d-flex justify-content-between align-items-center bet-slip-item"
                    data-home-team="${bet.home_team}"
                    data-away-team="${bet.away_team}"
                    data-match-date="${bet.match_date}"
                    data-match-time="${bet.match_time}"
                    data-odds="${bet.odds}">
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
    // Ensure date and time are correctly formatted
    if (!date || !time) {
        alert("Match date or time is missing. Cannot place bet.");
        return;
    }

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

// Ensure odds click event properly adds bets
$(document).on('click', '.odds-btn', function () {
    const matchElement = $(this).closest('.sports-card');
    const home_team = matchElement.find('.sports-card__team-name').first().text().trim();
    const away_team = matchElement.find('.sports-card__team-name').last().text().trim();
    const date_time = matchElement.find('.sports-card__info-time').html().trim().split('<br>'); 
    const date = date_time[0].trim();
    const time = date_time.length > 1 ? date_time[1].trim() : '';

    const odds = $(this).text().trim();

    addToBetSlip(home_team, away_team, date, time, odds);
});

// Submit bet slip data
$(document).on("click", "#place-bet-btn", function () {
    if (betSlip.length === 0) {
        alert("No bets selected!");
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
            betSlip = []; // Clear the bet slip after successful bet
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






<script>
	document.getElementById("year").textContent = new Date().getFullYear();
</script>
</body>

</html>