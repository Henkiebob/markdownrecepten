@extends('layouts/app')
@section('content')
  <h1>Recepten</h1>

  <div class="columns">
    <div class="column">
      @foreach ($recipes as $recipe)
      <div class="card recipe">
        <div class="card-content">
          <p class="title">
            {{$recipe->title}}
          </p>
          <p class="subtitle">
            10 minuten
          </p>
        </div>
        <footer class="card-footer">
          <p class="card-footer-item">
            <span>
              <a class="button" href="/recipe/view/1">Bekijk recept</a>
            </span>
          </p>
        </footer>
        @if ($recipe->tags)
          <footer class="card-footer">
            <p class="card-footer-item">
              @foreach ($recipe->tags as $tag)
                  <span class="tag is-info">{{$tag->name}}</span>
              @endforeach
            </p>
          </footer>
        @endif
      </div>
      @endforeach
    </div>
  </div>

@endsection
