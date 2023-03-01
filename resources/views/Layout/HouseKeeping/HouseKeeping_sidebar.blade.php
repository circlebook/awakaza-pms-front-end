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
                    <a href="{{url('/HouseKeeping_dashboard')}}" class="waves-effect bx-fade-right-hover">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <li class="menu-title" key="t-menu">House Keeping</li>

                <li>
                    <a href="{{url('/Maintenance')}}" class="waves-effect bx-fade-right-hover">
                        <i class="fa fa-solid fa-broom"></i>
                        <span key="t-dashboards">Rooms to be cleaned</span>

                    </a>
                </li>

                <li class="menu-title" key="t-menu">Mini Bar</li>

                <li>
                    <a href="{{url('/Mini_bar')}}" class="waves-effect bx-fade-right-hover">
                        <i class="bx bx bxs-wine"></i>
                        <span key="t-dashboards">Update Mini Bar</span>

                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>