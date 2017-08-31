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

              <a class="btn btn-danger" href="/app/days">Back</a>
            </span>
      		</div>

      		<div class="panel-body">
      			
      				<!--  Put content here -->
      				<p>Progress towards diet goal: {{ $day->food_goal_progress * 100 }}%</p>

              @foreach($foods as $food)

                <div class="well">
                  <h4>{{ $food->name }}</h4>
                  <h4>{{ $food->typeName() }}</h4>
                  <p>{{ $food->mealName() }}</p>
                  <p>{{ $food->processed ? 'Processed food' : 'Whole food' }}</p>
                  <p>{{ $food->description}}</p>
                </div>

              @endforeach
      		</div>
      </div>
    </div>
  </div>
</div>
@endsection