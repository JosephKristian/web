<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - LEMA</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{ asset('dist/assets/css/style.css') }}">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('dist/assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('dist/assets/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('dist/assets/css/app.rtl.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('dist/assets/css/vendor-material-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('dist/assets/css/vendor-material-icons.rtl.css') }}" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="{{ asset('dist/assets/css/vendor-fontawesome-free.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('dist/assets/css/vendor-fontawesome-free.rtl.css') }}" rel="stylesheet">

    <!-- ion Range Slider -->
    <link type="text/css" href="{{ asset('dist/assets/css/vendor-ion-rangeslider.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('dist/assets/css/vendor-ion-rangeslider.rtl.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="layout-default">
    <div id="app">
        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">

            <!-- Navbar -->
            @include('layouts.partials.navbar')

            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">@yield('title')</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Main content -->
                        @yield('content')
                        <!-- /.content -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            @include('layouts.partials.footer')

        </div>
        <!-- ./wrapper -->

        @auth
            @php
                $userRole = Auth::user()->role;
            @endphp

            <!-- Sidebar -->
            @if($userRole == 'admin')
                @include('layouts.partials.sidebar-admin')
            @elseif($userRole == 'mahasiswa')
                @include('layouts.partials.sidebar-mahasiswa')
            @elseif($userRole == 'dosen')
                @include('layouts.partials.sidebar-dosen')
            @else
                @include('layouts.partials.sidebar-default')
            @endif
        @endauth
    </div>

    <!-- jQuery -->
    <script src="{{ asset('dist/assets/vendor/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('dist/assets/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('dist/assets/vendor/bootstrap.min.js') }}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('dist/assets/vendor/perfect-scrollbar.min.js') }}"></script>

    <!-- DOM Factory -->
    <script src="{{ asset('dist/assets/vendor/dom-factory.js') }}"></script>

    <!-- MDK -->
    <script src="{{ asset('dist/assets/vendor/material-design-kit.js') }}"></script>

    <!-- Range Slider -->
    <script src="{{ asset('dist/assets/vendor/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/ion-rangeslider.js') }}"></script>

    <!-- App -->
    <script src="{{ asset('dist/assets/js/toggle-check-all.js') }}"></script>
    <script src="{{ asset('dist/assets/js/check-selected-row.js') }}"></script>
    <script src="{{ asset('dist/assets/js/dropdown.js') }}"></script>
    <script src="{{ asset('dist/assets/js/sidebar-mini.js') }}"></script>
    <script src="{{ asset('dist/assets/js/app.js') }}"></script>

</body>
</html>
