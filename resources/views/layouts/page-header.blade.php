<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Pages</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">@yield('page-name')</a>
            </li>
        </ul>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        <a href="@yield('add_button_url')" class="btn btn-label-info btn-round me-2"> @yield('add_button')</a>
        {{-- <a href="#" class="btn btn-primary btn-round">Add Customer</a> --}}
    </div>
</div>
