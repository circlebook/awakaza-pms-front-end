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


                <li class="menu-title" key="t-menu">Add new</li>

                <li>
                    <a href="{{url('/createbill')}}" class="waves-effect bx-fade-right-hover">
                        <i class="fa fa-duotone fa-credit-card"></i>
                        <span key="t-dashboards">Create Bill</span>

                    </a>
                </li>
                <!-- Added By Sandarekha -->


                <li class="menu-title" key="t-menu">Advance option</li>

                <li>
                    <a href="{{url('/Maintenance')}}" class="waves-effect bx-fade-right-hover">
                        <i class="fa fa-duotone fa-credit-card"></i>
                        <span key="t-dashboards">Spliting bill</span>

                    </a>
                </li>
                <!-- Add End -->




            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>