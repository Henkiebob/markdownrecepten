
<div class="columns is-desktop is-multiline">
  @foreach ($recipes as $recipe)
  <div class="column is-3">
    <div class="card recipe" data-title="{{strtolower($recipe->title)}}">
      <div class="card-content">
        <p class="title">
          {{$recipe->title}}
        </p>
        <p class="subtitle">
          10 minuten
        </p>
        <p class="tags">
          @if ($recipe->tags)
            @foreach ($recipe->tags as $tag)
                <span class="tag is-info">{{$tag->name}}</span>
            @endforeach
          @endif
        </p>
      </div>
    </div>
  </div>
  @endforeach
</div>
