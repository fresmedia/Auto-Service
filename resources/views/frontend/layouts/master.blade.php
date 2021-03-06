<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('public/img/favicon.ico') }}">

    @include('frontend.layouts.partials.styles')
    <title>@yield('title', 'Welcome to DM Words')</title>
</head>

<body>
    @include('frontend.layouts.partials.navbar')
    @yield('main-content')
    @include('frontend.layouts.partials.footer')
    @include('frontend.layouts.partials.scripts')
</body>

</html>
