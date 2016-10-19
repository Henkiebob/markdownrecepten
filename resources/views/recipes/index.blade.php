@extends('layouts/app')
@section('content')
  <h1>Recepten</h1>
  <div class="container-fluid">
    <div class="row">
        @foreach ($recipes as $recipe)
          <div class="col-md-3">
          <div class="thumbnail">
               <img src="/images/recipes/{{$recipe->image['filename']}}" alt="{{$recipe->title}}">
               <div class="caption">
                 <h3>{{$recipe->title}}</h3>
                 <p>{{strip_tags(substr($recipe->description, 0, 100))}}</p>
                 <p>
                    <a href="#" class="btn btn-primary" role="button">Bekijk recept</a>
                 </p>
               </div>
             </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
