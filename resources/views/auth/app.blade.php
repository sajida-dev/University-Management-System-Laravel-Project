<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/kaiadmin/fav.ico') }}" type="image/x-icon">
    <title>{{ config('app.name', 'University Of Education') }}</title>

    @include('layouts.css')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="wrapper">
        @include('layouts.sidebar')
        <!-- Page Content -->
        <div class="main-panel">
            @include('layouts.navigation')
            <div class="container">
                <div class="page-inner">
                    @include('layouts.page-header')
                    <main>
                        @yield('admin-main')
                    </main>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.scripts')
</body>

</html>
