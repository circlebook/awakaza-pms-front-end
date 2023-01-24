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
                    <a href="{{url('/dashboard')}}" class="waves-effect bx-fade-right-hover">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                @if($role == 'Admin')
                <li class="menu-title" key="t-menu">Users</li>

                <li>
                    <a href="{{url('/userManagement')}}" class="waves-effect bx-fade-right-hover">
                        <i class="bx bx bxs-user"></i>
                        <span key="t-dashboards">User Management</span>

                    </a>
                </li>

                <!-- Added By Geethaka -->
                <li class="menu-title" key="t-menu">Locators</li>

                <li>
                    <a href="{{url('/locatorManagement')}}" class="waves-effect bx-fade-right-hover">
                        <i class="fa fa-solid fa-location-crosshairs"></i>
                        <span key="t-dashboards">Locator Management</span>

                    </a>
                </li>
                <!-- Add End -->
                @endif


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
