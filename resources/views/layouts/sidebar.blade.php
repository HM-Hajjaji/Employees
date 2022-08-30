<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('vendors/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 " style="opacity: .8">
{{--        <div class="brand-image img-circle elevation-3 mt-2">--}}
{{--            <i class="fas fa-user-cog"></i>--}}
{{--        </div>--}}
        <span class="brand-text font-weight-light">{{env("APP_NAME")}}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-users nav-icon"></i>
                        <p>
                            Employees
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('employee.all')}}" class="nav-link active">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('employee.create')}}" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-trash nav-icon"></i>
                                <p>Trashed</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

    </div>

</aside>
