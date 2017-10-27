<html>
    <head>
        <title>Markdownrecepten - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('css')
    </head>
    <body>
        <div class="container is-fluid is-fullhd">

          @if (Route::getCurrentRoute()->getName() == 'recipes')
            <div class="field search">
              <p class="control">
                <input class="input is-large" id="recipe_search" type="text" placeholder="Find a recipe by tag or name">
                <span class="icon is-small is-left">
                <i class="fa fa-envelope"></i>
                </span>
              </p>
            </div>

            <div class="level">
              <div class="level-left">
                <div class="level-item">
                  <div class="control"><a href="{{route('new_recipe')}}" class="button is-success">Toevoegen</a></div>
                </div>
              </div>
            </div>
          @endif

          @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
        @yield('script')
    </body>
</html>
