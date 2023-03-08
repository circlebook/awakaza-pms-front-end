@php
$role = session('role');

@endphp
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{url('/FrontOps_dashboard')}}" class="waves-effect bx-fade-right-hover">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <li class="menu-title" key="t-menu">Guest Reg Cards</li>

                <li>
                    <a href="{{url('/FrontOps_Grc')}}" class="waves-effect bx-fade-right-hover">
                        <i class="bx bx bxs-user"></i>
                        <span key="t-dashboards">Create GRC</span>

                    </a>
                </li>
                <!-- Added By Sandarekha -->
                <li class="menu-title" key="t-menu">Room management</li>

                <li>
                    <a href="{{url('/room_management')}}" class="waves-effect bx-fade-right-hover">
                        <i class="bx bx bxs-user"></i>
                        <span key="t-dashboards">Change room</span>

                    </a>
                </li>
                <!-- Add End -->



                <li class="menu-title" key="t-menu">Guest Profiles</li>

                <li>
                    <a href="{{url('/gProfile')}}" class="waves-effect bx-fade-right-hover">
                        <i class="bx bx bxs-user"></i>
                        <span key="t-dashboards">Create Guest Profile</span>

                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>