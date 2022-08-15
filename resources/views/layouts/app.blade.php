<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">


    <link href="/css/style.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/ABC/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('/ABC/js/jquery-3.4.1.min.js') }}" defer></script>
    <script src="{{ asset('/js/jquery.js') }}" defer></script>
    <script src="{{ asset('/js/jquery.slim.min.js') }}"></script>
    {{-- <script src="{{ asset('/js/poper.min.js') }}"></script> --}}
</head>

<body >
        @include('layouts.navigation')
        {{-- @include('layouts.nav2') --}}
        {{-- @include('sidenav') --}}

        <!-- Page Heading -->
        {{-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

        <!-- Page Content -->
        @yield('content')

    <!-- Scripts -->
  

</body>
</html>
