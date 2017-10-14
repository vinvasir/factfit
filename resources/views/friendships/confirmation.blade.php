@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }} sent you a friend request.</div>

                <div class="panel-body">
                		<form action="/app/friendships/{{ $user->id }}/accept" method="POST">
                				{{ csrf_field() }}

                				<button type="submit" class="btn btn-primary">Accept</button>
                		</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
