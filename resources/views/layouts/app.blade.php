<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- adminlema --}}
        <link rel="stylesheet" href="{{ asset('dist/assets/css/style.css') }}">
        <!-- Perfect Scrollbar -->
        <link type="text/css" href="dist/assets/vendor/perfect-scrollbar.css" rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css" href="dist/assets/css/app.css" rel="stylesheet">
        <link type="text/css" href="dist/assets/css/app.rtl.css" rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css" href="dist/assets/css/vendor-material-icons.css" rel="stylesheet">
        <link type="text/css" href="dist/assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

        <!-- Font Awesome FREE Icons -->
        <link type="text/css" href="dist/assets/css/vendor-fontawesome-free.css" rel="stylesheet">
        <link type="text/css" href="dist/assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

        <!-- ion Range Slider -->
        <link type="text/css" href="dist/assets/css/vendor-ion-rangeslider.css" rel="stylesheet">
        <link type="text/css" href="dist/assets/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
