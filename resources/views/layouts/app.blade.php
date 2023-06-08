<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }} {{ isset($title) ? '| '.$title : '' }}</title>
        <link rel="apple-touch-icon" href="{{ asset('template-asset/app-assets/images/ico/apple-icon-120.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template-asset/app-assets/images/ico/favicon.ico') }}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
        <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('template-asset/app-assets/css/vendors.min.css') }}">
        @yield('vendor-style')
        @stack('vendor-style')
        <link rel="stylesheet" type="text/css" href="{{ asset('template-asset/app-assets/css/app.min.css') }}">
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('template-asset/app-assets/css/components.min.css') }}"> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('template-asset/app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('template-asset/app-assets/css/core/colors/palette-gradient.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('template-asset/app-assets/fonts/simple-line-icons/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('template-asset/app-assets/css/pages/timeline.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('template-asset/app-assets/css/pages/dashboard-ecommerce.css') }}">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        @yield('style')
        @stack('style')
    </head>
    <body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

        @include('layouts.navigation')

        <!-- Menu -->
        @include('layouts.sidebar')

        <!-- Page Content -->
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-6 col-12 mb-2">
                        <h3 class="content-header-title">{{ isset($title) ? $title : 'All Post' }}</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                @include('layouts.breadcrumb')
                            </div>
                        </div>
                    </div>
                </div>

                
                @include('layouts.flash-message')
                <div class="content-body">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <!-- Footer -->
        {{-- <footer class="footer fixed-bottom footer-static footer-light navbar-shadow"> --}}
        <footer class="footer footer-static footer-light navbar-border">
            @include('layouts.footer')
        </footer>

        <script src="{{ asset('template-asset/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('template-asset/app-assets/vendors/js/ui/headroom.min.js') }}" type="text/javascript"></script>

        @yield('vendor-script')
        @stack('vendor-script')

        <script src="{{ asset('template-asset/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
        <script src="{{ asset('template-asset/app-assets/js/core/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('template-asset/app-assets/custom/js/core.init.js') }}"></script>
        <script src="{{ asset('template-asset/app-assets/js/scripts/customizer.min.js') }}"></script>
        @yield('script')
        @stack('script')
    </body>
</html>
