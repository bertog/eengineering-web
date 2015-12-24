<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>.:: Electronic Engineering - Dashboard ::.</title>
    <link rel="stylesheet" href="/css/backoffice.css">
    <link rel="stylesheet" href="/css/libs.css">
    @yield('script.header')
</head>
<body>
    @yield('content')

    <script src="/js/libs.js"></script>
    @yield('script.footer')
    @include('flash')
</body>
</html>