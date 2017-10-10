@extends('layouts.app')

@section('content')

<div class="container">
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

		@foreach($users as $user)

			<a href="/app/profiles/{{ $user->id }}"><h3>{{ $user->name }}</h3></a>

		@endforeach


		</div>

	</div>

</div>

@endsection

