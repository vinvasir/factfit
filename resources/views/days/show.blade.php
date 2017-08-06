@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">


      		<div class="panel-heading">
      			<h3>Activity on {{ $day->date }}</h3>

            <span class="level">
              <a class="btn btn-primary" href="/app/days/{{ $day->id }}/foods/create">Add a Food You Ate on this Day</a>
            </span>
      		</div>

      		<div class="panel-body">
      			
      				<!--  Put content here -->
      				<p>Progress towards diet goal: {{ $day->food_goal_progress * 100 }}%</p>
      		</div>
      </div>
    </div>
  </div>
</div>
@endsection