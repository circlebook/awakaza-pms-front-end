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
                    <a href="{{url('/BackOps_dashboard')}}" class="waves-effect bx-fade-right-hover">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Overview</span>
                    </a>
                </li>

 
                <li class="menu-title" key="t-menu">Reservations</li>

                <li>
                    <a href="{{url('/BackOps_Reservation_Confirmed')}}" class="waves-effect bx-fade-right-hover">
                        <i class="fa fa-light fa-people-roof"></i>
                        <span key="t-dashboards">Reservation Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/BackOps_PayerInfo')}}" class="waves-effect bx-fade-right-hover">
                        <i class="bx bx bxs-user"></i>
                        <span key="t-dashboards">Payer Info</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/Maintenance')}}" class="waves-effect bx-fade-right-hover">
                        <i class="fa fa-solid fa-utensils"></i>
                        <span key="t-dashboards">Meal Plan</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
