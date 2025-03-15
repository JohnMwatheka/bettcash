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




	<!--Page Tittle-->
	<title>Admin Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('body.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('body.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('home')
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('body.footer')
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
				   <p class="mt-3 mb-1">Web Designe Company</p>
				   <div class="list-group">
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mt-3 mb-1">Software Development</p>
				   <div class="list-group">
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mt-3 mb-1">Online Shoping Portals</p>
				   <div class="list-group">
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="gap-2 py-1 list-group-item list-group-item-action align-items-center d-flex"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
				   </div>
				</div>
			</div>
		  </div>
		</div>
	  </div>
    <!-- end search modal -->
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
<!-- end betslip modal -->



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
		let allMatches = [];
		let currentPage = 1;
		let lastPage = 1;
		const perPage = 50; // Number of matches to show per page
	
		function fetchMatches(page = 1) {
			$.ajax({
				url: `/matches?page=${page}`,
				method: 'GET',
				timeout: 10000, // 10 seconds timeout
				beforeSend: function () {
					$('#matches-container').html('<p class="text-center">Loading matches...</p>');
				},
				success: function (response) {
					allMatches = response.data; // Update allMatches with the new data
					lastPage = response.last_page; // Update lastPage from the API response
					currentPage = page; // Update currentPage
					renderMatches(allMatches); // Render the matches
					updatePaginationButtons(); // Update the state of pagination buttons
				},
				error: function (xhr, textStatus) {
					console.error(xhr.responseText);
					if (textStatus === "timeout") {
						alert('Request timed out. Please try again.');
					} else {
						alert('An error occurred while fetching matches.');
					}
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
										<span class="sports-card__team-name bold text-capitalize">${match.home_team_name}</span>
									</span>
									<span class="sports-card__info">
										<span class="sports-card__info-time fs-0.1">${match.date} <br />${match.time}</span>
									</span>
									<span class="sports-card__team">
										<span class="sports-card__team-flag">
											<img src="${match.away_team_image}" alt="Away Team">
										</span>
										<span class="sports-card__team-name bold text-capitalize">${match.away_team_name}</span>
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
	
		function updatePaginationButtons() {
			$('#prevPage').prop('disabled', currentPage <= 1); // Disable "Previous" on the first page
			$('#nextPage').prop('disabled', currentPage >= lastPage); // Disable "Next" on the last page
		}
	
		$(document).ready(function () {
			fetchMatches(); // Fetch the first set of matches on page load
	
			// "Previous" button click handler
			$('#prevPage').click(function () {
				if (currentPage > 1) {
					fetchMatches(currentPage - 1); // Fetch the previous set of matches
				}
			});
	
			// "Next" button click handler
			$('#nextPage').click(function () {
				if (currentPage < lastPage) {
					fetchMatches(currentPage + 1); // Fetch the next set of matches
				}
			});
		});
	</script>
	
	
	
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
	
	// Check if user is authenticated
	function isAuthenticated() {
		return $('meta[name="user-auth"]').attr("content") === "authenticated";
	}
	
	$(document).on('click', '.odds-btn', function() {
		const matchElement = $(this).closest('.sports-card');
		const home_team = matchElement.find('.sports-card__team-name').first().text().trim();
		const away_team = matchElement.find('.sports-card__team-name').last().text().trim();
		const date_time = matchElement.find('.sports-card__info-time').html().trim().split('<br>'); 
		const date = date_time[0].trim();
		const time = date_time.length > 1 ? date_time[1].trim() : '';
	
		const odds = $(this).text().trim();
	
		addToBetSlip(home_team, away_team, date, time, odds);
	});
	
	$(document).on("click", "#place-bet-btn", function() {
		if (betSlip.length === 0) {
			alert("No bets selected!");
			return;
		}
	
		// Check if the user is logged in
		if (!isAuthenticated()) {
			alert("Authorization error! Please log in to place a bet.");
			window.location.href = "/login"; // Redirect to login page
			return;
		}
	
		$.ajax({
			url: "https://apartments-westlands-nairobi.co.ke/mpesa-app/public/bets/store",
			type: "POST",
			data: JSON.stringify({ bets: betSlip }),
			contentType: "application/json",
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			success: function(response) {
				alert(response.message);
				betSlip = []; 
				updateBetSlip();
				$('#betslip').modal('hide');
			},
			error: function(xhr) {
				console.error(xhr.responseJSON);
				alert("Error placing bet. Check console for details.");
			},
		});
	});
	
	</script>


	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	  <!-- End Data Table-->
      <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>


	<script>
		new PerfectScrollbar(".app-container");
	</script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script>
	@if(Session::has('message'))
	var type = "{{ Session::get('alert-type','info') }}"
	switch(type){
    case 'info':
		toastr.info(" {{ Session::get('message') }} ");
	break;
	case 'success':
			toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
		toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
		toastr.error(" {{ Session::get('message') }} ");
    break;
}
 @endif
 </script>
</body>

</html>
