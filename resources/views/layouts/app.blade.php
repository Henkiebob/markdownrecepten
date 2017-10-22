<html>
    <head>
        <title>Markdownrecepten - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        @yield('css')
    </head>
    <body>
        <div class="container is-fluid is-fullhd">

          <div class="field search">
            <p class="control">
              <input class="input is-large" id="recipe_search" type="text" placeholder="Find a recipe">
              <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
              </span>
            </p>
          </div>

          <div class="level">
            <div class="level-left">
              <div class="level-item">
                <div class="control"><a class="button is-success">Toevoegen</a></div>
              </div>
            </div>
          </div>

            @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
        @yield('script')
    </body>
</html>
