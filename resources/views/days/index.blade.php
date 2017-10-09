@extends('layouts.app')

@section('content')

<div class="container">
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
		<a class="btn btn-primary" href="/app/days/create">Add a day</a>

		{!! $calendar->calendar() !!}

		@foreach($days as $day)

			<a href="/app/days/{{ $day->id }}"><h3>{{ $day->date }}</h3></a>

			<i>Diet goal {{ $day->food_goal_progress * 100 }}% complete</i>

		@endforeach

    {!! $calendar->script() !!}


		</div>

	</div>

</div>

@endsection

