<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="description"
        content="Theta is a bootstrap & laravel admin dashboard template"
    />
    <meta
        name="keywords"
        content="admin, admin dashboard, admin panel, admin template, analytics, bootstrap 4, crm, laravel admin, responsive, sass support, ui kits"
    />
    <meta name="author" content="Themesbox17" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
    />
    <title>PKBM - English Tutorial Centre</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="/assets/images/etc.jpg" />
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
    <!-- jvectormap css -->
    <link
        href="/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css"
        rel="stylesheet"
    />
    <!-- Datepicker css -->
    <link
        href="/assets/plugins/datepicker/datepicker.min.css"
        rel="stylesheet"
        type="text/css"
    />
    <link
        href="/assets/css/bootstrap.min.css"
        rel="stylesheet"
        type="text/css"
    />
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link
        href="/assets/css/flag-icon.min.css"
        rel="stylesheet"
        type="text/css"
    />
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- End css -->
</head>
<body class="vertical-layout">
<!-- Start Infobar Notifications Sidebar -->
<div class="infobar-notifications-sidebar-overlay"></div>
<!-- End Infobar Notifications Sidebar -->
<!-- Start Infobar Setting Sidebar -->
<div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
    <div
        class="
          infobar-settings-sidebar-head
          d-flex
          w-100
          justify-content-between
        "
    >
        <h4>Settings</h4>
        <a
            href="javascript:void(0)"
            id="infobar-settings-close"
            class="infobar-settings-close"
        ><img
                src="/assets/images/svg-icon/close.svg"
                class="img-fluid menu-hamburger-close"
                alt="close"
            /></a>
    </div>
    <div class="infobar-settings-sidebar-body">
        <div class="custom-color-setting">
            <div class="row align-items-center">
                <div class="col-12">
                    <h6 class="mb-3">Select Color</h6>
                </div>
                <div class="col-12">
                    <div class="custom-radio-button ml-1">
                        <div class="form-check-inline radio-primary">
                            <input
                                type="radio"
                                id="customRadioInlineSidebar1"
                                name="customRadioInlineSidebar"
                                checked
                            />
                            <label for="customRadioInlineSidebar1"></label>
                        </div>
                        <div class="form-check-inline radio-secondary">
                            <input
                                type="radio"
                                id="customRadioInlineSidebar2"
                                name="customRadioInlineSidebar"
                            />
                            <label for="customRadioInlineSidebar2"></label>
                        </div>
                        <div class="form-check-inline radio-success">
                            <input
                                type="radio"
                                id="customRadioInlineSidebar3"
                                name="customRadioInlineSidebar"
                            />
                            <label for="customRadioInlineSidebar3"></label>
                        </div>
                        <div class="form-check-inline radio-danger">
                            <input
                                type="radio"
                                id="customRadioInlineSidebar4"
                                name="customRadioInlineSidebar"
                            />
                            <label for="customRadioInlineSidebar4"></label>
                        </div>
                        <div class="form-check-inline radio-warning">
                            <input
                                type="radio"
                                id="customRadioInlineSidebar5"
                                name="customRadioInlineSidebar"
                            />
                            <label for="customRadioInlineSidebar5"></label>
                        </div>
                        <div class="form-check-inline radio-info">
                            <input
                                type="radio"
                                id="customRadioInlineSidebar6"
                                name="customRadioInlineSidebar"
                            />
                            <label for="customRadioInlineSidebar6"></label>
                        </div>
                        <div class="form-check-inline radio-light">
                            <input
                                type="radio"
                                id="customRadioInlineSidebar7"
                                name="customRadioInlineSidebar"
                            />
                            <label for="customRadioInlineSidebar7"></label>
                        </div>
                        <div class="form-check-inline radio-dark">
                            <input
                                type="radio"
                                id="customRadioInlineSidebar8"
                                name="customRadioInlineSidebar"
                            />
                            <label for="customRadioInlineSidebar8"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-mode-setting">
            <div class="row align-items-center pb-3">
                <div class="col-8"><h6 class="mb-0">Night Mode</h6></div>
                <div class="col-4 text-right">
                    <input type="checkbox" class="js-switch-night-mode" checked />
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-8"><h6 class="mb-0">Navigation Sidebar</h6></div>
                <div class="col-4 text-right">
                    <input
                        type="checkbox"
                        class="js-switch-navigation-sidebar"
                        checked
                    />
                </div>
            </div>
        </div>
        <div class="custom-layout-setting">
            <div class="row align-items-center pb-3">
                <div class="col-12">
                    <h6 class="mb-3">Select Account</h6>
                </div>
                <div class="col-12">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <div class="account-box">
                            <img
                                src="/assets/images/users/women.svg"
                                class="img-fluid"
                                alt="user"
                            />
                            <h5>{{ Auth::user()->name }}</h5>
                            <p>Logout</p>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="infobar-settings-sidebar-overlay"></div>
<!-- End Infobar Setting Sidebar -->
<!-- Start Containerbar -->
<div id="containerbar">
    <!-- Start Leftbar -->
    <div class="leftbar">
        <!-- Start Sidebar -->
        <div class="sidebar">
            <!-- Start Logobar -->
            <div class="logobar">
                <a href="index.html" class="logo logo-large"
                ><img src="/assets/images/etc.jpg" class="img-fluid" alt="logo" style="width: 100px"
                    /></a>

                <a href="index.html" class="logo logo-small"
                ><img
                        src="/assets/images/etc.jpg"
                        class="img-fluid"
                        alt="logo"
                    /></a>
            </div>
            <center>
            <h5>Admin</h5>
            <p>English Tutorial Centre</p>
            </center>
            <!-- End Logobar -->
            <!-- Start Profilebar -->
            <div class="profilebar text-center">
                <hr>
                <div class="userbox">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="#" class="profile-icon"
                            ><img
                                    src="/assets/images/svg-icon/user.svg"
                                    class="img-fluid"
                                    alt="user"
                                /></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="profile-icon"
                            ><img
                                    src="/assets/images/svg-icon/email.svg"
                                    class="img-fluid"
                                    alt="email"
                                /></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="profile-icon"
                            ><img
                                    src="/assets/images/svg-icon/logout.svg"
                                    class="img-fluid"
                                    alt="logout"
                                /></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Profilebar -->
            <!-- Start Navigationbar -->
            <div class="navigationbar">
                <ul class="vertical-menu">
                    <li class="vertical-header">Main</li>
                    <li>
                        <a href="javaScript:void();">
                            <img
                                src="/assets/images/svg-icon/dashboard.svg"
                                class="img-fluid"
                                alt="dashboard"
                            /><span>Master</span
                            ><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li>
                                <a href="{{route('book.index')}}"
                                ><i class="mdi mdi-circle"></i>Book</a
                                >
                            </li>
                            <li>
                                <a href="{{route('newclass.index')}}"
                                ><i class="mdi mdi-circle"></i>Class</a
                                >
                            </li>
                            <li>
                                <a href="{{route('room.index')}}"
                                ><i class="mdi mdi-circle"></i>Room</a
                                >
                            </li>
                            <li>
                                <a href="{{route('program.index')}}"
                                ><i class="mdi mdi-circle"></i>Programs</a
                                >
                            </li>
                            <li>
                                <a href="{{route('expenses.index')}}"
                                ><i class="mdi mdi-circle"></i>Expenses</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img
                                src="/assets/images/svg-icon/advanced.svg"
                                class="img-fluid"
                                alt="dashboard"
                            /><span>Employees</span
                            ><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li>
                                <a href="{{route('employee.index')}}"
                                ><i class="mdi mdi-circle"></i>Employees</a
                                >
                            </li>
                            <li>
                                <a href="{{route('mistake.index')}}"
                                ><i class="mdi mdi-circle"></i>Mistake</a
                                >
                            </li>
                            <li>
                                <a href="{{route('overtime.index')}}"
                                ><i class="mdi mdi-circle"></i>Over Time</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img
                                src="/assets/images/svg-icon/user.svg"
                                class="img-fluid"
                                alt="dashboard"
                            /><span>Customer</span
                            ><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li>
                                <a href="{{route('customer.index')}}"
                                ><i class="mdi mdi-circle"></i>Customers</a
                                >
                            </li>
                            <li>
                                <a href="{{route('folup.index')}}"
                                ><i class="mdi mdi-circle"></i>Folup Customers</a
                                >
                            </li>
                            <li>
                                <a href="{{route('service.index')}}"
                                ><i class="mdi mdi-circle"></i>School Service Program</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img
                                src="/assets/images/svg-icon/form_elements.svg"
                                class="img-fluid"
                                alt="dashboard"
                            /><span>Corporates</span
                            ><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li>
                                <a href="{{route('corporate.index')}}"
                                ><i class="mdi mdi-circle"></i>Corporate</a
                                >
                            </li>
                            <li>
                                <a href="{{route('corporatecustomer.index')}}"
                                ><i class="mdi mdi-circle"></i>Siswa Corporate</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img
                                src="/assets/images/svg-icon/apps.svg"
                                class="img-fluid"
                                alt="apps"
                            /><span>Apps</span
                            ><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li>
                                <a href="{{route('certificate.index')}}"
                                ><i class="mdi mdi-circle"></i>Certificates</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img
                                src="/assets/images/svg-icon/tables.svg"
                                class="img-fluid"
                                alt="tables"
                            /><span>Tables</span
                            ><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li>
                                <a href="{{route('customer.siswa')}}"
                                ><i class="mdi mdi-circle"></i>Siswa</a
                                >
                            </li>
                            <li>
                                <a href="{{route('customer.nonsiswa')}}"
                                ><i class="mdi mdi-circle"></i>Non Siswa</a
                                >
                            </li>
                            <li>
                                <a href="{{route('customer.pospone')}}"
                                ><i class="mdi mdi-circle"></i>Pospone</a
                                >
                            </li>
                            <li>
                                <a href="{{route('customer.berhenti')}}"
                                ><i class="mdi mdi-circle"></i>Berhenti</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="/assets/images/svg-icon/chart.svg" class="img-fluid" alt="chart"><span>Incoming</span><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{route('customer.incomingDaily')}}"><i class="mdi mdi-circle"></i>Incoming Daily</a></li>
                            <li><a href="{{route('customer.incomingMonthly')}}"><i class="mdi mdi-circle"></i>Incoming Monthly</a></li>
                            <li><a href="{{route('customer.incomingAnnual')}}"><i class="mdi mdi-circle"></i>Incoming Annual</a></li>
                        </ul>
                    </li>
{{--                    <li>--}}
{{--                        <a href="widgets.html">--}}
{{--                            <img src="/assets/images/svg-icon/widgets.svg" class="img-fluid" alt="widgets"><span>Report</span><i class="feather icon-chevron-right pull-right"></i>--}}
{{--                        </a>--}}
{{--                        <ul class="vertical-submenu">--}}
{{--                            <li><a href="chart-c3.html"><i class="mdi mdi-circle"></i>Incoming Daily</a></li>--}}
{{--                            <li><a href="chart-chartistjs.html"><i class="mdi mdi-circle"></i>Incoming Monthly</a></li>--}}
{{--                            <li><a href="chart-chartjs.html"><i class="mdi mdi-circle"></i>Incoming Annual</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="vertical-header">Front End</li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="/assets/images/svg-icon/layouts.svg" class="img-fluid" alt="layouts"><span>Layouts</span><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{route('testimonial.index')}}"><i class="mdi mdi-circle"></i>Testimonial</a></li>
                            <li><a href="{{route('study.index')}}"><i class="mdi mdi-circle"></i>Study</a></li>
                            <li><a href="{{route('carrier.index')}}"><i class="mdi mdi-circle"></i>Carrier</a></li>
                            <li><a href="{{route('gallery.index')}}"><i class="mdi mdi-circle"></i>Gallery</a></li>
                            <li><a href="{{route('activity.index')}}"><i class="mdi mdi-circle"></i>Activity</a></li>
                            <li><a href="{{route('comment.index')}}"><i class="mdi mdi-circle"></i>Comment</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- End Navigationbar -->
        </div>
        <!-- End Sidebar -->
    </div>
    <!-- End Leftbar -->

    <!-- Start Rightbar -->
    <div class="rightbar">
        <!-- Start Topbar Mobile -->
        <div class="topbar-mobile">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="mobile-logobar">
                        <a href="index.html" class="mobile-logo"
                        ><img
                                src="/assets/images/etc.jpg" style="width: 50px"
                                class="img-fluid"
                                alt="logo"
                            /></a>
                    </div>
                    <div class="mobile-togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="topbar-toggle-icon">
                                    <a
                                        class="topbar-toggle-hamburger"
                                        href="javascript:void();"
                                    >
                                        <img
                                            src="/assets/images/svg-icon/horizontal.svg"
                                            class="img-fluid menu-hamburger-horizontal"
                                            alt="horizontal"
                                        />
                                        <img
                                            src="/assets/images/svg-icon/verticle.svg"
                                            class="img-fluid menu-hamburger-vertical"
                                            alt="verticle"
                                        />
                                    </a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="javascript:void();">
                                        <img
                                            src="/assets/images/svg-icon/collapse.svg"
                                            class="img-fluid menu-hamburger-collapse"
                                            alt="collapse"
                                        />
                                        <img
                                            src="/assets/images/svg-icon/close.svg"
                                            class="img-fluid menu-hamburger-close"
                                            alt="close"
                                        />
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Topbar -->
        <div class="topbar">
            <!-- Start row -->
            <div class="row align-items-center">
                <!-- Start col -->
                <div class="col-md-12 align-self-center">
                    <div class="togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="javascript:void();">
                                        <img
                                            src="/assets/images/svg-icon/collapse.svg"
                                            class="img-fluid menu-hamburger-collapse"
                                            alt="collapse"
                                        />
                                        <img
                                            src="/assets/images/svg-icon/close.svg"
                                            class="img-fluid menu-hamburger-close"
                                            alt="close"
                                        />
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="infobar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="settingbar">
                                    <a
                                        href="javascript:void(0)"
                                        id="infobar-settings-open"
                                        class="infobar-icon"
                                    >
                                        <img
                                            src="/assets/images/svg-icon/settings.svg"
                                            class="img-fluid"
                                            alt="settings"
                                        />
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End Topbar -->
        <!-- Start Breadcrumbbar -->
        <!-- End Breadcrumbbar -->
        <!-- Start Contentbar -->
        <!-- Start row -->
        @include('sweetalert::alert')

        @yield('content')
        @yield('js')

        <!-- End row -->
        <!-- End Contentbar -->
        <!-- Start Footerbar -->
        <div class="footerbar">
            <footer class="footer">
                <p class="mb-0">© 2024 PKBM - English Tutorial Centre by <a  href="https://www.instagram.com/fauzanantoni07/" style="color: blue">Ahmad Fauzan Antoni</a>.</p>
            </footer>
        </div>
        <!-- End Footerbar -->
    </div>
    <!-- End Rightbar -->
</div>
<!-- End Containerbar -->
<!-- Start js -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/modernizr.min.js"></script>
<script src="/assets/js/detect.js"></script>
<script src="/assets/js/jquery.slimscroll.js"></script>
<script src="/assets/js/vertical-menu.js"></script>
<!-- Switchery js -->
<script src="/assets/plugins/switchery/switchery.min.js"></script>
<!-- Chart js -->
<script src="/assets/plugins/chart.js/chart.min.js"></script>
<script src="/assets/plugins/chart.js/chart-bundle.min.js"></script>
<!-- Piety Chart js -->
<script src="/assets/plugins/peity/jquery.peity.min.js"></script>
<!-- Vector Maps js -->
<script src="/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- Custom Dashboard Social js -->
<script src="/assets/js/custom/custom-dashboard-social.js"></script>
<!-- Core js -->
<script src="/assets/js/core.js"></script>
<!-- End js -->
</body>
</html>
{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">Dashboard</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    You are logged in!--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
