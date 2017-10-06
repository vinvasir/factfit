@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create an Entry for this Day</div>

                <div class="panel-body">
                		<form action="/app/days" method="POST">
                				{{ csrf_field() }}

                				<div class="form-group">
            						<label for="date">Date:</label>
            						<input type="date" name="date" id="date" class="form-control"
                                    value="{{ old('date') }}" required>
                				</div>

                                <div class="form-group">
                                    <label for="weight">Your Weight This Day:</label>
                                    <input type="text" name="weight" id="weight" class="form-control"
                                           value="{{ old('weight') }}" required>
                                </div>

                				<button type="submit" class="btn btn-primary">Publish</button>
                		</form>

                        <a class="btn btn-danger" href="/app/days">Back</a>

                        @if (count($errors))
                            <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection