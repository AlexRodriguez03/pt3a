<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pt2e - @yield('title')</title>
        @section('stylesheets')
	    <link rel="stylesheet" href="{{ asset('css/taula.css') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="https://laravel.com/img/logomark.min.svg">
        @show
    </head>
    <body>
        @include('navbar')

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>