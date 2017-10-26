@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <day inline-template :init-day-data="{{ $day }}" endpoint="/app/days/{{ $day->id }}">

        <div class="panel panel-default">
        		<div class="panel-heading">
        			<h3>Activity on {{ $day->date }}</h3>

              <span class="level">
                <a class="btn btn-primary" href="#food-form">Add a Food You Ate on this Day</a>

                <a class="btn btn-danger" href="/app/days">Back</a>
              </span>
        		</div>

        		<div class="panel-body">
        			
        				<!--  Put content here -->
        				<p>Progress towards diet goal: @{{ dayData.food_goal_progress * 100 }}%</p>

                <food-list 
                  endpoint="/app/days/{{ $day->id }}/foods"
                  @list_updated="refreshDayData"
                  >
                </food-list>

        		</div>
        </div>

      </day>

    </div>
  </div>
</div>

@endsection