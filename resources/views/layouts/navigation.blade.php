<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <a href="{{ route('index') }}">
            <h4 class="logo-text">Bettcash</h4>
        </a>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="{{ route('bets.selections') }}"><i class='bx bx-radio-circle'></i>Selections</a>
                </li>
                <li> <a href="index2.html"><i class='bx bx-radio-circle'></i>Bets</a>
                </li>
                <li> <a href="index3.html"><i class='bx bx-radio-circle'></i>Wallet</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
<!--start header -->
<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="gap-3 navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>

            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                <input class="px-5 form-control" disabled type="search" placeholder="Search">
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 fs-5"><i class='bx bx-search'></i></span>
            </div>

            <div class="top-menu ms-auto">
                <ul class="gap-1 navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                        <a class="nav-link" href="javascript:;"><i class='bx bx-search'></i></a>
                    </li>
                    <li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown"><img src="assets/images/county/02.png" width="22" alt=""></a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="javascript:;"><img src="assets/images/county/01.png" width="20" alt=""><span class="ms-2">English</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i></a>
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
                                            <h6 class="msg-name">Daisy Anderson<span class="msg-time float-end">5 sec ago</span></h6>
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
                                        <div class="cart-product-cancel"><i class="bx bx-x"></i></div>
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
                        @if(Auth::user()->profile_image)
                            <img src="{{ asset('assets/upload/users/' . Auth::user()->profile_image) }}" class="user-img" alt="user avatar">
                        @else
                            <img src="{{ asset('assets/upload/users/default_user_img.jpeg') }}" class="user-img" alt="default user avatar">
                        @endif
                        <div class="user-info">
                            <p class="mb-0 user-name">{{ Auth::user()->first_name }}</p>
                            <p class="mb-0 designattion">{{ Auth::user()->last_name }}</p>
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
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('login') }}" onclick="event.preventDefault(); this.closest('form').submit();">
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
<!--end header -->