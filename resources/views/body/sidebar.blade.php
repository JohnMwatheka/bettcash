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