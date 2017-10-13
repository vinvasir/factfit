@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">


      		<div class="panel-heading">
      			<h3>Profile for {{ $user->name }}</h3>

            <span class="level">

              <a class="btn btn-danger" href="/app/days">Back</a>
            </span>
      		</div>

      		<div class="panel-body">
            <graph :labels="{{ $weightByDay->keys() }}" 
                   :values="{{ $weightByDay->values() }}"
                   color="red"
             ></graph>
          </div>

      </div>
    </div>
  </div>
</div>
@endsection