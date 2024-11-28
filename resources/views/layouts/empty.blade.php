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