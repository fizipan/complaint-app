<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.auth.meta')

        <!-- Title -->
        <title>@yield('title') | Report online</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" href="{{ asset('/back-design/clients/img/apple-touch-icon.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/back-design/clients/img/favicon.ico') }}">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

        {{-- Fonts --}}
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

        @stack('before-style')
        <!-- style -->
        @include('includes.auth.style')

        @stack('after-style')
    </head>
    <body>
        
        @yield('content')
        
        @stack('before-script')
        
        <!-- script -->
        @include('includes.auth.script')
        
        @stack('after-script')

    </body>
</html>
