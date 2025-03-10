<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png"/>
	<!--plugins-->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet"/>
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css"/>
	<link rel="stylesheet" href="assets/css/semi-dark.css"/>
	<link rel="stylesheet" href="assets/css/header-colors.css"/>
	<title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
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
				@foreach ($sports as $sport)
					<li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"></div>
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
						<div class="position-relative d-lg-block ">
						<p class="mx-2 btn btn-danger btn-sm" id="showUpcoming">Upcoming</p>										
					  </div>
					  <div class="position-relative d-lg-block">						
						<p class="mx-2  btn btn-info btn-sm" id="showPlayed">All</p>						
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
							
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown"><span class="alert-count">1</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-badge">1 New</p>
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
											<p class="msg-header-title">My Bets</p>
											<p class="msg-header-badge">10 Items</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="gap-3 d-flex align-items-center">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="assets/images/products/11.png" class="" alt="product image">
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
												<h5 class="mb-0">Total stake</h5>
												<h5 class="mb-0 ms-auto">$489.00</h5>
											</div>
											<button class="btn btn-primary w-100">View bets</button>
										</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="px-3 user-box dropdown">
						<a class="gap-3 d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info">
								<p class="mb-0 user-name">Pauline Seitz</p>
								<p class="mb-0 designattion">...</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-cog fs-5"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-dollar-circle fs-5"></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-download fs-5"></i><span>Downloads</span></a>
							</li>
							<li>
								<div class="mb-0 dropdown-divider"></div>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							</li>
						</ul>
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
    <div class="modal" id="SearchModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
		  <div class="modal-content">
			<div class="gap-2 modal-header">
			  <div class="position-relative popup-search w-100">
				<input class="border form-control form-control-lg ps-5 border-3 border-primary" type="search" placeholder="Search">
				<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 fs-4"><i class='bx bx-search'></i></span>
			  </div>
			  <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="search-list">
				   <p class="mb-1">Html Templates</p>
				   <div class="list-group">
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action active align-items-center d-flex"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
				   </div>
				</div>
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
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/chart.js"></script>
	<script src="assets/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		new PerfectScrollbar(".app-container");
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
		$(document).on('click', '.fetch-leagues', function (e) {
			e.preventDefault();
			const sportId = $(this).data('sport-id');
	
			// Make an AJAX request to fetch leagues for the selected sport
			$.ajax({
				url: `/sports/${sportId}/leagues`,
				method: 'GET',
				beforeSend: function () {
					// Show a loading spinner or message
					$('#leagues-container').html('<div class="text-center">Loading...</div>');
				},
				success: function (response) {
					if (response.status === 'success') {
						const leagues = response.data;
	
						// Render leagues dynamically
						let html = `
							<div class="card col-lg-4 col-sm-6">
								<div class="card-body">
									<ul class="list-group">
						`;
	
						leagues.forEach(league => {
							html += `
								<li class="list-group-item d-flex justify-content-between align-items-center">
									${league.name}
									<img src="${league.logo}" alt="${league.name} Logo" class="img-thumbnail" style="width: 50px; height: 50px;">
								</li>
							`;
						});
	
						html += `
									</ul>
								</div>
							</div>
						`;
	
						$('#leagues-container').html(html);
					} else {
						alert(response.message);
					}
				},
				error: function (xhr) {
					console.error(xhr.responseText);
					$('#leagues-container').html('<div class="text-center text-danger">An error occurred while fetching leagues.</div>');
				}
			});
		});
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
										<span class="me-3"><strong>Home:</strong> <span class="">${match.odds_home_win}</span></span>
										<span class="me-3"><strong>Draw:</strong> <span class="">${match.odds_draw}</span></span>
										<span><strong>Away:</strong> <span class="">${match.odds_away_win}</span></span>
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
<script>
	document.getElementById("year").textContent = new Date().getFullYear();
</script>
</body>

</html> 