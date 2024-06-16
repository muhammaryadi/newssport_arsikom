<!doctype html>
<html class="no-js" data-theme="light" lang="en">
<head>
    @include('public_view.layout.header')
</head>

<body>

    @include('public_view.layout.menu')
    @yield('content')

    @include('public_view.layout.footer')
</body>

</html>