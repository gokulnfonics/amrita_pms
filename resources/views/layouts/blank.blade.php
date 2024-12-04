<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8" />
    <meta name="description" content="Placement Management System" />
    <meta name="keywords" content="Placement Management System" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Placement Management System" />
    <meta property="og:site_name" content="Placement Management System" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ url('/') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link id="theme-style" rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat bg-body-color">



    <div id="kt_app_header" class="app-header">
        <!--begin::Header container-->
        <div class="app-container container-xxl d-flex align-items-stretch justify-content-between"
            id="kt_app_header_container">
            <!--begin::Logo-->
            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                <a href="" class="mb-0">
                    <img alt="Logo" src="assets/media/logos/logo_dark.png" class="h-75px" />
                </a>
            </div>
            <!--end::Logo-->
            <!--begin::Header wrapper-->
            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                <!--begin::Menu wrapper-->
                <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                    data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                    data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                    <!--begin::Menu-->
                    <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                        id="kt_app_header_menu" data-kt-menu="true">
                        <!--begin:Menu item-->
                        <div
                            data-kt-menu-placement="bottom-start"
                            class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                            <!--begin:Menu link-->
                            <a href="{{route('job.index')}}" class="menu-link">
                                <span class="menu-title fs-5">Jobs</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                            <!--end:Menu link-->

                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                            data-kt-menu-placement="bottom-start"
                            class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-title fs-5">Companies</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <!--end:Menu link-->

                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
                <!--begin::Navbar-->
                <div class="app-navbar flex-shrink-0">





                    <!--begin::User menu-->
                    <div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end">
                            <img src="{{ isset(Auth::user()->personalInformation->image_path) && !empty(Auth::user()->personalInformation->image_path) ? asset('storage/images/' . Auth::user()->personalInformation->image_path) : asset('assets/images/user-thumb.jpg') }}" alt="user" />
                        </div>
                        <!--begin::User account menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{ isset(Auth::user()->personalInformation->image_path) && !empty(Auth::user()->personalInformation->image_path) ? asset('storage/images/' . Auth::user()->personalInformation->image_path) : asset('assets/images/user-thumb.jpg') }}" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->first_name }} @if(Auth::user()->last_name){{ Auth::user()->last_name }}@endif
                                            <span
                                                class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{Auth::user()->role}}</span>
                                        </div>
                                        <a href="#"
                                            class="fw-semibold text-muted text-hover-primary fs-7">{{Auth::user()->email}}</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{ route('student.edit', ['student' => Auth::user()->id]) }}" class="menu-link px-5">My Profile</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="../../demo1/dist/apps/projects/list.html" class="menu-link px-5">
                                    <span class="menu-text">My Jobs</span>
                                    <span class="menu-badge">
                                        <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                                    </span>
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="menu-link px-5">Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::User account menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User menu-->
                    <!--begin::Header menu toggle-->
                    <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Header menu toggle-->
                </div>
                <!--end::Navbar-->
            </div>
            <!--end::Header wrapper-->
        </div>
        <!--end::Header container-->
    </div>
    <!--end::Header-->

    @yield('content')



    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ url('/') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ url('/') }}/assets/js/scripts.bundle.js"></script>
    <script src="{{ url('/') }}/assets/js/userprofile.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->

    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    @yield('pageScripts')
</body>
<!--end::Body-->

</html>