
<div class="section">
<form method="POST">
  <div class="field">
    <label class="label">Titel</label>
    <div class="control">
      <input class="input" name="title" type="text" placeholder="Omschrijf wat je gaat koken!" id="title" value="@if(isset($recipe)) {{$recipe->title}} @endif">
    </div>
  </div>

  <div class="field">
    <label class="label" for="recipe-tags">Tags</label>
    <div class="control">
      <select id="recipe-tags" name="tags[]" class="form-control" multiple style="width:100%">
          @foreach($tags as $tag)
              @if(isset($recipe) && $recipe->tags->contains($tag))
                  <option value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
              @else
                  <option value="{{ $tag->name }}">{{ $tag->name }}</option>
              @endif
          @endforeach
      </select>
    </div>
  </div>

  <div class="field">
    <label class="label">Recept</label>
    <div class="control">
      <textarea class="textarea" id="recipe-content-textarea" placeholder="Je recept hier" name="description"></textarea>
    </div>
  </div>

  {{ csrf_field() }}

  <div class="control">
    <input type="submit" class="button is-success" value="Toevoegen"/>
  </div>
</form>
</section>

@section('script')
    <script src="//cdn.bootcss.com/select2/4.0.3/js/select2.min.js"></script>
    <script src="//cdn.bootcss.com/simplemde/1.11.2/simplemde.min.js"></script>
    <script>
        $("#recipe-tags").select2({
            tags: true
        });
        $(document).ready(function () {
            var simplemde = new SimpleMDE({
                autoDownloadFontAwesome: true,
                element: document.getElementById("recipe-content-textarea"),
                autosave: {
                    enabled: true,
                    uniqueId: "recipe.create",
                    delay: 1000,
                },
                renderingConfig: {
                    codeSyntaxHighlighting: true,
                },
                spellChecker: false,
                toolbar: ["bold", "italic", "heading", "|", "quote", 'code', 'ordered-list', 'unordered-list', 'link', 'table', '|', 'preview', 'side-by-side', 'fullscreen'],
            });
        });
    </script>
@endsection
