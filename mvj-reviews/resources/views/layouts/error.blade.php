<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title')</title>


    @yield('publics')
    <link href="{{ asset('css/errors.css',false) }}" rel="stylesheet">

</head>

<body>
      <main id="content">
          @yield('content')
      </main>
</body>

</html>
