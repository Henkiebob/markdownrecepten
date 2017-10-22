<html>
    <head>
        <title>Markdownrecepten - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        @yield('css')
    </head>
    <body>
        <nav class="navbar" role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a class="navbar-item" href="/">
                Home
            </a>

            <button class="button navbar-burger">
              <span></span>
              <span></span>
              <span></span>
            </button>
          </div>
        </nav>

        <div class="container is-fluid">
            @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
        @yield('script')
    </body>
</html>
