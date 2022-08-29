<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Styles for adminlte-->
        <link rel="stylesheet" href="{{asset('vendors/plugins/fontawesome-free/css/all.min.css')}}">

        <link rel="stylesheet" href="{{asset('vendors/dist/css/adminlte.min.css?v=3.2.0')}}">

        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Scripts for adminlte-->
        <script defer src="{{asset('vendors/plugins/jquery/jquery.min.js')}}"></script>

        <script defer src="{{asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <script defer src="{{asset('vendors/dist/js/adminlte.min.js?v=3.2.0')}}"></script>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <header>
                @include("layouts.navigation")
            </header>
            <main>
                <aside>
                    @include('layouts.sidebar')
                </aside>
                <section class="content-wrapper">
                    @yield("content")
                </section>
            </main>
            <footer>
                @include('layouts.footer')
            </footer>
        </div>
    </body>
</html>
