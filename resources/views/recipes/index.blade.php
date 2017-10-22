@extends('layouts/app')
@section('content')
  <div class="columns">

      @foreach ($recipes as $recipe)
      <div class="column is-one-quarter">
        <div class="card recipe" data-title="{{strtolower($recipe->title)}}">
          <div class="card-content">
            <p class="title">
              {{$recipe->title}}
            </p>
            <p class="subtitle">
              10 minuten
            </p>
          </div>
          @if ($recipe->tags)
            @foreach ($recipe->tags as $tag)
                <span class="tag is-info">{{$tag->name}}</span>
            @endforeach
          @endif
        </div>
      </div>
      @endforeach
  </div>
@endsection


@section('script')
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded',function() {

    document.getElementById('recipe_search').addEventListener('keydown', function (event) {
        query = this.value;
        var recipes = document.querySelectorAll('div.recipe');

        recipes.forEach(function(recipe) {
            // if (event.keyCode == 8) {
            //   recipe.style.opacity = '100';
            // }
            
            if(recipe.getAttribute('data-title').indexOf(query) > -1){
              recipe.style.opacity = '100';
            } else {
              recipe.style.opacity = '0';
            }
        });

    });

  },false);

</script>
@endsection
