<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
    <body>
    <div>
    @yield('contend')
    </div>
    </body>
</html>
