<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        @yield('css')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
        @yield('script')
    </body>
</html>
