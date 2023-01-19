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
                    <a href="{{url('/Billing_dashboard')}}" class="waves-effect bx-fade-right-hover">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

             
                <li class="menu-title" key="t-menu">Billing</li>

                <li>
                    <a href="{{url('/Maintenance')}}" class="waves-effect bx-fade-right-hover">
                        <i class="fa fa-duotone fa-credit-card"></i>
                        <span key="t-dashboards">View Bill</span>

                    </a>
                </li>
              


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
