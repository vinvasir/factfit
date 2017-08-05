@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(Auth::check())

                    <h3>Successfully logged in!</h3>

                    <p><a href="/app">Click here</a> to start recording your fitness activity</p>

                    @else

                    <h3>Welcome to Factfit! Please log in to continue.</h3>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
