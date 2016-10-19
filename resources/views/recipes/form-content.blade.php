<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Titel:</label>
    <input type="text" name="title" class="form-control" id="title" value="@if(isset($recipe)) {{$recipe->title}} @endif">
  </div>
  <div class="form-group">
    <label for="description">Recept</label>
    <textarea class="form-control" rows="3" name="description" id="recipe-content-textarea"></textarea>
  </div>

  <div class="form-group">
    <label for="title">Tags:</label>
    <select id="recipe-tags" name="tags[]" class="form-control" multiple>
        @foreach($tags as $tag)
            @if(isset($recipe) && $recipe->tags->contains($tag))
                <option value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
            @else
                <option value="{{ $tag->name }}">{{ $tag->name }}</option>
            @endif
        @endforeach
    </select>
  </div>

  <div class="form-group">
     <label for="file">Foto van eindresultaat</label>
     <input type="file" id="files" name="file">
     <p class="help-block">Een enkele foto van het eindresultaat!</p>
   </div>

  <button type="submit" class="btn btn-success">Toevoegen</button>
  {{ csrf_field() }}
</form>

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
