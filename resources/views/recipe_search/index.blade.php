@extends('layouts.app')

@section('content')

<div class="container">
  
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Search Recipes Below:</h1>

      <recipe-search></recipe-search>

      <recipe-detail></recipe-detail>
    </div>

  </div>

</div>

@endsection