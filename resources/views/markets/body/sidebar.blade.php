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