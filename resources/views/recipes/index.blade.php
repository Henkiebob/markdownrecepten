@extends('layouts/app')
@section('content')
  <div id="recipes">
      <!-- Fill with AJAX -->
  </div>
@endsection


@section('script')
  <script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({
      headers:
      { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    
    getRecipes();

    $('#recipe_search').on('keydown', function (e) {
      getRecipes(this.value);
    });

    function getRecipes(query) {
      $.ajax({
          type: "POST",
          url: '/recipes/filter',
          data: {title: query},
          success: function( data ) {
              $("#recipes").html(data);
          }
      });
    }
  });
  </script>
@endsection
