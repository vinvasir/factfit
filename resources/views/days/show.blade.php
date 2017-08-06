@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">


      		<div class="panel-heading">
      			<h3>Activity on {{ $day->date }}</h3>
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